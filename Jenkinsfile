pipeline {
    agent { label 'linux' }
    triggers { cron('H H(18-19) * * *') }
    options { buildDiscarder(logRotator(daysToKeepStr: '30', numToKeepStr: '100') ) }
    environment {
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    stages{
        stage('Build') {
            steps { sh 'docker run --rm -v $PWD:/app composer install' } }
        stage('Test') {
            steps { sh 'docker run --rm -v $PWD:/app -w /app php:7.2-cli ./vendor/bin/phpunit' }
        }
    }
    post {
        failure {
            emailext body: "Failure -- Console output at $BUILD_URL.",
                subject: 'Failure: $BUILD_DISPLAY_NAME | $JOB_BASE_NAME', 
                to: "${AUTHOR_EMAIL}"
        }
    }
}


