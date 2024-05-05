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
                sshagent(['ecaa20c1-aacb-4788-9a98-e5e8d784b765']) {
                    sh '''

                    scp -r ${WORKSPACE}/* nedfistaging@10.0.0.65:/var/www/html/test/

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
