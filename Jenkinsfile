pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'           	
	   }
        }
        stage('Code Inspeaction - SonarQube') {
            steps {
                echo 'Testing Stage'

                /*environment {
                    scannerHome = tool 'SonarQubeScanner'
                }
                steps {
                    script {
                        withSonarQubeEnv('SonarQube') {
                            sh "${scannerHome}/bin/sonar-scanner \
                            -Dsonar.projectKey=nedfi-sms \
                            -Dsonar.projectName=nedfi-sms \
                            -Dsonar.language=PHP"
                        }
                    }
                }*/

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
