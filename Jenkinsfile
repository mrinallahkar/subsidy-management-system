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
                sshagent(['production']) {
                    sh '''
                    ssh -tt -o StrictHostKeyChecking=no ubuntu@68.233.117.222 ls
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
