pipeline {
    agent any

    stages {
        stage('Git Changes'){
            steps {
                git branch: 'cms-revamp/development', credentialsId: 'gui_common_github_account', url: 'https://github.com/guisrilanka/GUI_CMS_Revamp.git'
            }
        }
        stage('Deploy Application') {
            steps {
                sh 'php --version'
                sh 'composer update'
                sh 'composer --version'
                sh 'php artisan key:generate'
                sh 'php artisan migrate'
            }
        }
    }
}
