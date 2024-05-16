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
            }
                /*environment {
                        scannerHome = tool 'SonarQubeScanner'
                }    
                steps {
                        withSonarQubeEnv('sonarqube') {
                        sh "${scannerHome}/bin/sonar-scanner --version"
                        }        
                        timeout(time: 10, unit: 'MINUTES') {
                            waitForQualityGate abortPipeline: true
                        }
                    }*/
        }
        stage('Deploy to Staging') {
            steps {
                sshagent(['staging']) {
                    sh '''
                        rsync -a -P ${WORKSPACE}/* --exclude={.env} staging@144.24.134.21:/var/www/html/subsidy/
                    '''
                    sh '''
                        ssh ubuntu@144.24.134.21 
                        ls
                        sudo su
                        ls
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
