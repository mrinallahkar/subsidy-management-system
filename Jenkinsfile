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
                sh "copy ${WORKSPACE}/* 'C:\test\'"
            }
        }
        stage('Deploy to Production') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}
