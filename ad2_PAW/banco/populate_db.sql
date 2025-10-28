/* 

populate_db feito com auxílio de IA generativa. Qualquer correspondência com dados na vida real são meramente coincidências

*/



CREATE DATABASE IF NOT EXISTS sistema_eventos;
USE sistema_eventos;

INSERT INTO participantes (nome, email, matricula, curso, data_inscricao)
VALUES
('Ana Paula Souza', 'ana.souza@example.com', '2021001', 'Engenharia de Software', '2025-01-15 09:00:00'),
('Bruno Henrique Lima', 'bruno.lima@example.com', '2021002', 'Sistemas de Informação', '2025-01-20 10:30:00'),
('Carla Mendes', 'carla.mendes@example.com', '2021003', 'Ciência da Computação', '2025-02-10 08:45:00'),
('Diego Ferreira', 'diego.ferreira@example.com', '2021004', 'Análise e Desenvolvimento de Sistemas', '2025-02-18 14:00:00'),
('Eduarda Silva', 'eduarda.silva@example.com', '2021005', 'Engenharia da Computação', '2025-03-01 11:15:00');


INSERT INTO eventos (nome, descricao, data_evento, vagas, carga_horaria)
VALUES
('Semana da Computação', 'Evento acadêmico com palestras e workshops sobre inovação tecnológica.', '2028-11-29 09:00:00', 200, 20),
('Hackathon Universitário', 'Competição de programação com prêmios para as melhores soluções.', '2025-04-10 08:00:00', 100, 36),
('Oficina de Inteligência Artificial', 'Introdução prática ao uso de modelos de IA e machine learning.', '2025-05-05 14:00:00', 50, 8),
('Feira de Startups', 'Apresentação de projetos empreendedores de alunos e ex-alunos.', '2025-06-20 10:00:00', 150, 10),
('Workshop de Segurança da Informação', 'Palestra sobre boas práticas de segurança digital.', '2025-07-12 09:30:00', 80, 6);

INSERT INTO inscricoes (participante_id, evento_id, data_inscricao, status)
VALUES
(1, 1, '2025-02-01 10:00:00', 'ativa'),
(1, 2, '2025-03-20 09:00:00', 'ativa'),
(2, 1, '2025-02-05 11:30:00', 'cancelada'),
(2, 3, '2025-04-30 15:45:00', 'ativa'),
(3, 2, '2025-03-25 13:10:00', 'ativa'),
(3, 4, '2025-05-30 16:20:00', 'ativa'),
(4, 5, '2025-06-15 09:45:00', 'ativa'),
(5, 1, '2025-02-10 08:50:00', 'cancelada'),
(5, 5, '2025-06-25 11:00:00', 'ativa');
