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
                    scp -r /var/lib/jenkins/workspace/NEDFi-CICD-SMS/* production@68.233.117.222:/var/www/html/subsidy-management-system/
                    '''
                }
            }
        }
        stage('Deploy to Production') {
            steps {
                    
	                input message: 'Do you want to approve the deployment?', ok: 'Yes'	                
			        echo "Initiating deployment"
            }
        }
    }
}
