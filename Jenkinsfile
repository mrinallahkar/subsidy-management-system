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
                sshagent(credentials: ['ecaa20c1-aacb-4788-9a98-e5e8d784b765']) {
                    sh '''
                    scp -r ${WORKSPACE}/* nedfistaging@144.24.140.152:/var/www/html/test/
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
