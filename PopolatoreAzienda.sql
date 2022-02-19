insert into componenti values 
('c001', 'bullone', 'meoni srl', 1.0 ),
('c002', 'vite_a_stella', 'magrini srl', 1.5 ),
('c003', 'vite_a_taglio', 'magrini srl', 1.5 ),
('c004', 'dado', 'meoni srl', 2.0 ),
('c005', 'rondella', 'rossi srl', 1.0 ),
('c006', 'rivetto', 'verdi srl', 3.0 );

insert into dipartimenti VALUES
('dp1', 'assemblaggio', 'Pistoia', 'PT'),
('dp2', 'controllo qualità', 'Bonelle', 'PT'),
('dp3', 'verniciatura', 'Cantagrillo', 'PT'),
('dp4', 'vendita', 'Firenze', 'FR'),
('dp5', 'Pubblicità', 'Livorno', 'LI');

insert into personale values 
('00000', 'dp1', 'Mario Rossi', '1966-12-12', 'Q1', 1200.0),
('00001', 'dp1', 'Mario Verdi', '1970-10-30', 'Q1', 1300.0),
('00002', 'dp2', 'Luca Meoni', '1980-04-15', 'Q2', 1500.0),
('00003', 'dp3', 'Pino Neri', '1975-09-17', 'Q3', 1400.0),
('00005', 'dp5', 'Dario Lampa', '1971-04-25', 'Q4', 1600.0),
('00004', 'dp4', 'Simone Termo', '1990-03-22', 'Q5', 1300.0);


insert into prodotti VALUES
('p001', 'dp1', 'manubrio', 20.0),
('p002', 'dp2', 'sella', 10.0),
('p003', 'dp3', 'ruota', 30.0),
('p004', 'dp4', 'pedali', 15.0),
('p005', 'dp5', 'porta', 15.0);

insert into composizione values
('p001', 'c001', 4.0),
('p001', 'c002', 2.0),
('p001', 'c003', 2.0),
('p001', 'c004', 4.0),
('p001', 'c005', 5.0),
('p001', 'c006', 1.0),
('p002', 'c001', 3.0),
('p002', 'c002', 2.0),
('p002', 'c003', 2.0),
('p002', 'c004', 6.0),
('p002', 'c005', 3.0),
('p002', 'c006', 10.0),
('p003', 'c001', 3.0),
('p003', 'c002', 15.0),
('p003', 'c003', 15.0),
('p003', 'c004', 7.0),
('p003', 'c005', 9.0),
('p003', 'c006', 1.0),
('p004', 'c001', 2.0),
('p004', 'c002', 2.0),
('p004', 'c003', 6.0),
('p004', 'c004', 5.0),
('p004', 'c005', 1.0),
('p004', 'c006', 8.0),
('p005', 'c003', 8.0),
('p005', 'c005', 8.0);