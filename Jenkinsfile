pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            input 'IS software testing passed?'
            steps {                
                echo 'Testing..'
            }
        }
        stage('Deploy to Staging') {
            steps {
                sh "scp -r ${WORKSPACE}/* nedfistaging@10.0.0.65:/var/www/html/test/"		       
            }
        }
        stage('Deploy to Production') {
            steps {
                input{
                    message "Do you want to proceed for production deployment?"
                }
                sh "ssh nedfistaging@10.0.0.65"
                sh "rsync -azvh /var/www/html/test/ ubuntu@10.0.0.108:/var/www/html/subsidy-management-system/"
            }
        }
    }
}
