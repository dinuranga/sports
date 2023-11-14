/****************************************************** 

            CREATE TABLES

********************************************************/




/*         Create Table Players           */

CREATE TABLE Players (
    PlayerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    DateOfBirth DATE,
    Gender VARCHAR(20),
    Email VARCHAR(100),
    PhoneNumber VARCHAR(20),
    Address TEXT,
    EmergencyContactName VARCHAR(100),
    EmergencyContactNumber VARCHAR(20),
    MedicalConditions TEXT,
    InsuranceInfo TEXT,
    TeamID INT,
    UniversityID INT
);


/*         Create Table Coaches          */

CREATE TABLE coaches (
  CoachID int(11) NOT NULL AUTO_INCREMENT,
  FirstName varchar(50) DEFAULT NULL,
  LastName varchar(50) DEFAULT NULL,
  DateOfBirth date DEFAULT NULL,
  Gender varchar(20) DEFAULT NULL,
  Email varchar(100) DEFAULT NULL,
  PhoneNumber varchar(20) DEFAULT NULL,
  Address text DEFAULT NULL,
  Specialty varchar(100) DEFAULT NULL,
  Certifications text DEFAULT NULL,
  TeamID int(11) DEFAULT NULL,
  RegistrationNo int(11) DEFAULT NULL,
  SportID int(11) DEFAULT NULL, -- Added field for the sport or team assignment
  PRIMARY KEY (CoachID),
  FOREIGN KEY (TeamID) REFERENCES Teams(TeamID), -- Reference to the Teams table
  FOREIGN KEY (SportID) REFERENCES Sports(SportID) -- Reference to the Sports table
);


/*         Create Table Sports          */

CREATE TABLE `sports` (
  `SportID` int(11) NOT NULL AUTO_INCREMENT,
  `SportName` varchar(50) DEFAULT NULL,
  `CoachID` int(11) DEFAULT NULL,
  PRIMARY KEY (`SportID`)
);


/*         Create Table Players Sports          */

CREATE TABLE `player_sports` (
  `PlayerSportID` int(11) NOT NULL AUTO_INCREMENT,
  `PlayerID` int(11) NOT NULL,
  `SportID` int(11) NOT NULL,
  PRIMARY KEY (`PlayerSportID`),
  FOREIGN KEY (`PlayerID`) REFERENCES `players`(`PlayerID`),
  FOREIGN KEY (`SportID`) REFERENCES `sports`(`SportID`)
);


/*         Create Table Practice           */

CREATE TABLE practices_schedule (
    PracticeID INT PRIMARY KEY AUTO_INCREMENT,
    SportID INT,
    CoachID INT,
    PracticeDate DATE,
    StartTime TIME,
    EndTime TIME,
    Location VARCHAR(255),
    FOREIGN KEY (SportID) REFERENCES sports(SportID),
    FOREIGN KEY (CoachID) REFERENCES coaches(CoachID)
);


/*         Create Table Inventory          */

CREATE TABLE inventory (
    EquipmentID INT AUTO_INCREMENT PRIMARY KEY,
    EquipmentName VARCHAR(255) NOT NULL,
    Quantity INT NOT NULL,
    Availability ENUM('Available', 'Not Available') NOT NULL
);


/*         Create Table Matches          */

CREATE TABLE matches (
    match_id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    location VARCHAR(255),
    home_team VARCHAR(255),
    away_team VARCHAR(255),
    home_score INT,
    away_score INT
);


/*         Create Table Sports          */

CREATE TABLE `coach_sports` (
  `CoachSportID` int(11) NOT NULL AUTO_INCREMENT,
  `CoachID` int(11) NOT NULL,
  `SportID` int(11) NOT NULL,
  PRIMARY KEY (`CoachSportID`),
  FOREIGN KEY (`CoachID`) REFERENCES `coaches`(`CoachID`),
  FOREIGN KEY (`SportID`) REFERENCES `sports`(`SportID`)
);

/*         Create Table Practice Schedule          */

CREATE TABLE practices_schedule (
    PracticeID INT PRIMARY KEY AUTO_INCREMENT,
    SportID INT,
    CoachID INT,
    PracticeDate DATE,
    StartTime TIME,
    EndTime TIME,
    Location VARCHAR(255),
    FOREIGN KEY (SportID) REFERENCES sports(SportID),
    FOREIGN KEY (CoachID) REFERENCES coaches(CoachID)
);





/****************************************************** 

            INSERT DATA INTO TABLES

********************************************************/


/*         Insert player Data            */

INSERT INTO `players` (`PlayerID`, `FirstName`, `LastName`, `DateOfBirth`, `Gender`, `Email`, `PhoneNumber`, `Address`, `EmergencyContactName`, `EmergencyContactNumber`, `MedicalConditions`, `TeamID`, `RegistrationNo`)
VALUES
    (1, 'Sachin', 'Silva', '2002-03-15', 'Male', 'sachin.silva@email.com', '777-111-1111', '10 Galle Road, Colombo, Sri Lanka', 'Samantha Silva', '777-999-9999', 'None', 201, 11111),
    (2, 'Sachini', 'Fernando', '2003-06-20', 'Female', 'sachini.fernando@email.com', '777-222-2222', '22 Kandy Road, Kandy, Sri Lanka', 'Nalini Fernando', '777-888-8888', 'Allergies', 201, 22222),
    (3, 'Kavindu', 'Perera', '2004-04-21', 'Male', 'kavindu.perera@email.com', '777-333-3333', '33 Jaffna Street, Jaffna, Sri Lanka', 'Ranjan Perera', '777-777-7777', 'Asthma', 202, 33333),
    (4, 'Nethmi', 'Rathnayake', '2005-08-23', 'Female', 'nethmi.rathnayake@email.com', '777-444-4444', '44 Trincomalee Lane, Trincomalee, Sri Lanka', 'Chamila Rathnayake', '777-666-6666', 'None', 203, 44444),
    (5, 'Isuru', 'Weerasinghe', '2003-09-10', 'Male', 'isuru.weerasinghe@email.com', '777-555-5555', '55 Gampaha Road, Gampaha, Sri Lanka', 'Lalitha Weerasinghe', '777-555-5555', 'None', 202, 55555),
    (6, 'Chathuri', 'Gunasekara', '2005-01-17', 'Female', 'chathuri.gunasekara@email.com', '777-666-6666', '66 Matara Street, Matara, Sri Lanka', 'Sarala Gunasekara', '777-444-4444', 'Allergies', 204, 66666),
    (7, 'Dinuka', 'Karunarathna', '2004-03-30', 'Male', 'dinuka.karunarathna@email.com', '777-777-7777', '77 Badulla Road, Badulla, Sri Lanka', 'Manjula Karunarathna', '777-333-3333', 'None', 203, 77777),
    (8, 'Methmini', 'Dias', '2006-05-25', 'Female', 'methmini.dias@email.com', '777-888-8888', '88 Kegalle Street, Kegalle, Sri Lanka', 'Sujatha Dias', '777-222-2222', 'None', 204, 88888),
    (9, 'Viraj', 'Silva', '2007-11-08', 'Male', 'viraj.silva@email.com', '777-999-9999', '99 Nuwara Eliya Lane, Nuwara Eliya, Sri Lanka', 'Chandima Silva', '777-111-1111', 'None', 205, 99999),
    (10, 'Dilani', 'Jayawardena', '2004-04-18', 'Female', 'dilani.jayawardena@email.com', '777-101-0101', '100 Ratnapura Road, Ratnapura, Sri Lanka', 'Priyani Jayawardena', '777-121-2121', 'Asthma', 205, 10101);


/*         Insert player Sports - All sports each individual player is participated            */

INSERT INTO `player_sports` (`ID`, `PlayerID`, `SportID`) VALUES
    (NULL, '202', '101'),
    (NULL, '203', '102'),
    (NULL, '204', '103'),
    (NULL, '205', '104'),
    (NULL, '206', '105'),
    (NULL, '207', '106'),
    (NULL, '208', '107'),
    (NULL, '209', '108'),
    (NULL, '210', '109'),
    (NULL, '211', '110');


/*         Insert Coach Data            */

INSERT INTO `coaches` (`CoachID`, `FirstName`, `LastName`, `DateOfBirth`, `Gender`, `Email`, `PhoneNumber`, `Address`, `Specialty`, `Certifications`, `SportID`, `Password`)
VALUES 
    (NULL, 'Kamal', 'Perera', '1980-05-15', 'Male', 'kamal.perera@example.com', '+94 77 123 4567', '123 Main St, Colombo', 'Football', 'UEFA Coaching License', '101', '1234'),
    (NULL, 'Niluka', 'Fernando', '1975-08-20', 'Female', 'niluka.fernando@example.com', '+94 71 987 6543', '456 Park Rd, Kandy', 'Basketball', 'Basketball Coaching Certification', '102', '1234'),
    (NULL, 'Saman', 'Silva', '1972-02-10', 'Male', 'saman.silva@example.com', '+94 76 234 5678', '789 Lake View, Galle', 'Cricket', 'Level 3 Cricket Coaching', '103', '1234'),
    (NULL, 'Dilhani', 'Wickramasinghe', '1978-11-25', 'Female', 'dilhani.w@example.com', '+94 72 876 5432', '101 Hillside Ave, Nuwara Eliya', 'Swimming', 'Swimming Coach Certification', '104', '1234'),
    (NULL, 'Chathura', 'Gunawardena', '1970-07-03', 'Male', 'chathura.g@example.com', '+94 70 345 6789', '456 Sunset Blvd, Matara', 'Tennis', 'Tennis Coaching Certification', '105', '1234'),
    (NULL, 'Sanduni', 'Fernando', '1974-09-18', 'Female', 'sanduni.f@example.com', '+94 75 876 5432', '789 Palm St, Jaffna', 'Volleyball', 'Volleyball Coaching License', '106', '1234'),
    (NULL, 'Roshan', 'Samaraweera', '1977-04-12', 'Male', 'roshan.s@example.com', '+94 76 234 5678', '102 Sea View, Trincomalee', 'Badminton', 'Badminton Coach Certification', '107', '1234'),
    (NULL, 'Anoma', 'Perera', '1973-06-30', 'Female', 'anoma.p@example.com', '+94 71 345 6789', '345 Hilltop Rd, Batticaloa', 'Athletics', 'Athletics Coaching Certification', '108', '1234'),
    (NULL, 'Chandana', 'De Silva', '1976-12-08', 'Male', 'chandana.ds@example.com', '+94 70 987 6543', '789 Forest Lane, Anuradhapura', 'Rugby', 'World Rugby Coaching Certificate', '109', '1234'),
    (NULL, 'Ishara', 'Jayasinghe', '1971-03-22', 'Female', 'ishara.j@example.com', '+94 72 123 4567', '456 River Rd, Polonnaruwa', 'Table Tennis', 'Table Tennis Coach Certification', '110', '1234');


/*         Insert Inverntory Data            */

INSERT INTO inventory (equipmentName, quantity, availability)
VALUES
    ('Cricket Balls', 50, 'Available'),
    ('Knee Guards', 25, 'Available'),
    ('Gloves', 35, 'Available'),
    ('Soccer Balls', 40, 'Available'),
    ('Shin Guards', 0, 'Not Available'),
    ('Basketballs', 30, 'Available'),
    ('Tennis Rackets', 0, 'Not Available'),
    ('Tennis Balls', 100, 'Available'),
    ('Badminton Rackets', 40, 'Available'),
    ('Badminton Shuttles', 200, 'Available');


/*         Insert Sports Data            */

INSERT INTO `sports` (`SportID`, `SportName`, `CoachID`)
VALUES
    (102, 'Tennis', 201),
    (103, 'Soccer', 202),
    (101, 'Cricket', 200),
    (104, 'Basketball', 203),
    (105, 'Badminton', 204),
    (106, 'Athletics', 205),
    (107, 'Volleyball', 206),
    (108, 'Swimming', 207),
    (109, 'Rugby', 208),
    (110, 'Table Tennis', 209);



/*         Insert Matches Data            */

INSERT INTO matches (MatchID, SportID, Date, Location, Teams, Winners)
VALUES
    (1001, 101, '2023-10-25', 'University of Colombo', 'Team A vs. Team B', 'Team A'),
    (1002, 102, '2023-10-26', 'University of Peradeniya', 'Team X vs. Team Y', 'Team Y'),
    (1003, 103, '2023-10-27', 'University of Kelaniya', 'Team P vs. Team Q', 'Team P'),
    (1004, 104, '2023-10-28', 'University of Moratuwa', 'Team M vs. Team N', 'Team N'),
    (1005, 101, '2023-10-29', 'University of Sri Jayewardenepura', 'Team C vs. Team D', 'Team D');


/*         Insert Practice Schedule Data            */

INSERT INTO practices_schedule (SportID, CoachID, PracticeDate, StartTime, EndTime, Location)
VALUES
    (1, 101, '2023-11-15', '09:00:00', '11:00:00', 'Sports Complex A'),
    (2, 102, '2023-11-16', '14:30:00', '16:30:00', 'Field B'),
    (3, 103, '2023-11-17', '10:00:00', '12:00:00', 'Gymnasium C'),
    (1, 104, '2023-11-18', '15:00:00', '17:00:00', 'Tennis Court D'),
    (2, 105, '2023-11-19', '11:30:00', '13:30:00', 'Track E');

