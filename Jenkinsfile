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
               // sh "scp -r ${WORKSPACE}/* ubuntu@10.0.0.108:/home/ubuntu/test/"		       
            }
        }
        stage('Deploy to Production') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}
