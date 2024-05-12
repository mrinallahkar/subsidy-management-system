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
        }
        stage('Deploy to Staging') {
            steps {
                sshagent(['staging']) {
                    sh '''
                        rsync -a -P ${WORKSPACE}/* staging@144.24.134.21:/var/www/html/subsidy/
                    '''
                }                                
            }
        }
        stage('Deploy to Production') {
            steps {
                sshagent(['production']) {
                    sh '''
                        ssh staging@144.24.134.21 rsync -a -P /var/www/html/subsidy/* production@68.233.117.222:/var/www/html/subsidy-management-system/
                        
                    '''
                }
                 emailext body: '''Dear Sir/Madam
                 Greetings for the day.
                 This is a notification for code deployment on production environment. Please check and take necessary action.
                 
                 Regards
                 NEDFi IT''', 
                 subject: 'NEDFi CICD (SMS) - Waiting for Production Deployment', 
                 to: 'mrinallahkar85@gmail.com'
	             
                 input message: 'Do you want to approve the deployment?', ok: 'Yes'	                
		         echo "Initiating deployment to production"
            }
        }
    }
}
