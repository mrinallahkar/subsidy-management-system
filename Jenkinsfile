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
                    scp -r /var/lib/jenkins/workspace/NEDFi-CICD-SMS/* StrictHostKeyChecking=no production@68.233.117.222:/var/www/html/subsidy-management-system/
                    '''
                }
            }
        }
        stage('Deploy to Production') {
            steps {
               echo 'Deploying in production..'
            }
        }
    }
}
