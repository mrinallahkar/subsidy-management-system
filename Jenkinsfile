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
                    ssh staging@144.24.134.21 ls
                    '''
                }
                
                sshagent(['production']) {
                    sh '''
                    scp -r /var/lib/jenkins/workspace/NEDFi-CICD-SMS/* production@68.233.117.222:/var/www/html/subsidy-management-system/
                    '''
                }
            }
        }
        stage('Deploy to Production') {
            steps {
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
