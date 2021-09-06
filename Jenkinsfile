pipeline{
    agent{lable 'linux'}
    options {
        buildDiscarder(logRotator(numToKeepStr:'5'))
    }
    stages{
        stage('Scan'){
            withSonarQubeEnv(installationName: 'sonarjenkins'){
                sh './mvnw clean org.sonarsource.scanner.maven:sonar-maven-plugin:3.9.9.2155:sonar'
            }
        }
    }
}