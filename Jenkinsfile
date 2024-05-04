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
                sh 'ls -l'
            }
        }
        stage('Deploy to Production') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}
