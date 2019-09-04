CREATE DATABASE ocorrencia_criminal;
USE ocorrencia_criminal;

CREATE TABLE ocorrencia(
    idOcorrencia int primary key not null auto_increment,
    tipoOcorrencia varchar(60),
    descricaoOcorrencia text,
    dataOcorrencia date,
    horarioOcorrencia time,
    midiaOcorrencia text,
    cordenadasOcorrencia varchar(100)    
);

