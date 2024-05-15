pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'           	
	   }
        }
        stage('Test') {
                steps {                
                    echo 'Testing..'
                        /*dir("${WORKSPACE}"){
                            script {
                                def scannerHome = tool name: 'scanner-name', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                                withSonarQubeEnv('sonar') {
                                    sh "echo $pwd"
                                    sh "${scannerHome}/bin/sonar-scanner"
                                }
                            }
                        }
                        */
                }
        }
        stage('Deploy to Staging') {
            steps {
                sshagent(['staging']) {
                    sh '''
                        rsync -a -P ${WORKSPACE}/* --exclude={.env} staging@144.24.134.21:/var/www/html/subsidy/
                    '''
                }                                
            }
        }
        stage('Deploy to Production') {
            steps {
                sshagent(['production']) {
                    input message: 'Do you want to approve the deployment?', ok: 'Yes'                  
                    echo "Initiating deployment to production"

                    sh '''
                        ssh staging@144.24.134.21 rsync -a -P --exclude={.env} /var/www/html/subsidy/* production@68.233.117.222:/var/www/html/subsidy-management-system/
                        
                    '''
                }
                 emailext body: '''Dear Sir/Madam
                 Greetings for the day.
                 This is a notification for code deployment on production environment. Please check and take necessary action.
                 
                 Regards
                 NEDFi IT''', 
                 subject: 'NEDFi CICD (SMS) - Waiting for Production Deployment', 
                 to: 'mrinallahkar85@gmail.com'
            }
        }
    }
}
