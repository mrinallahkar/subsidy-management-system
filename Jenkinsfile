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
                echo "scp -r ${WORKSPACE}/* nedfistaging@10.0.0.65:/var/www/html/test/"
            }
        }
        stage('Deploy to Production') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}
