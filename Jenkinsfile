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
                        scp -r ${WORKSPACE}/* staging@10.0.0.254:/var/www/html/subsidy/
                    '''
                }                                
            }
        }
        stage('Deploy to Production') {
            steps {
                sshagent(['production']) {
                    sh '''
                        ssh staging@10.0.0.254
                        rsync -avzP -e /var/www/html/subsidy/ ssh production@10.0.0.108:/var/www/html/subsidy-management-system/
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
