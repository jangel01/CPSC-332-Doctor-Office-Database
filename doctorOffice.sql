DROP DATABASE IF EXISTS docOffice;
CREATE DATABASE docOffice;
SET FOREIGN_KEY_CHECKS=0;
USE docOffice;

DROP TABLE IF EXISTS Patient;
CREATE TABLE Patient (
  SSN int NOT NULL,
  Last_Name varchar(50),
  PhoneNumber varchar(10),
  Street_Name varchar(50),
  Street_Number varchar(50),
  City varchar(50),
  State varchar(2),
  Zip_Code varchar(9),
  First_Name varchar(10),
  Insurance_ID varchar(15)
);

/* 1NF FOR PATIENT TABLE */
ALTER TABLE Patient
ADD PRIMARY KEY (SSN);

/* 2NF FOR PATIENT TABLE */
ALTER TABLE Patient
DROP COLUMN Insurance_ID;

DROP TABLE IF EXISTS Insurance;
CREATE TABLE Insurance (
	Insurance_ID varchar(15),
	First_Name varchar(10),
    PRIMARY KEY (First_Name)
);

ALTER TABLE Patient
ADD FOREIGN KEY (First_Name) REFERENCES Insurance(First_Name);

/* 3NF FOR PATIENT TABLE */
ALTER TABLE Patient
DROP COLUMN Street_Name;
ALTER TABLE Patient
DROP COLUMN Street_Number;
ALTER TABLE Patient
DROP COLUMN City;
ALTER TABLE Patient
DROP COLUMN State;
ALTER TABLE Patient
DROP COLUMN Zip_Code;

ALTER TABLE Patient
ADD Address_ID varchar(50);

DROP TABLE IF EXISTS Location;
CREATE TABLE Location (
	Address_ID varchar(50),
	Street_Name varchar(50),
    Street_Number varchar(50),
    City varchar(50),
    State varchar(2),
    Zip_Code varchar(9),
    PRIMARY KEY (Address_ID)
);

ALTER TABLE Patient
ADD FOREIGN KEY (Address_ID) REFERENCES Location(Address_ID);


/* CREATE TABLE DOCTOR */
DROP TABLE IF EXISTS Doctor;
CREATE TABLE Doctor (
	DoctorID varchar(50),
    Last_Name varchar(50),
    First_Name varchar(50) UNIQUE,
    Phone_Number varchar(10),
    Specialty varchar(40),
    Salary varchar(40)
    
    );
    
/* 1NF FOR DOCTOR TABLE */
ALTER TABLE Doctor
ADD PRIMARY KEY (DoctorID);

/* 2NF FOR DOCTOR TABLE */
ALTER TABLE Doctor
DROP COLUMN Salary;

DROP TABLE IF EXISTS Salary;
CREATE TABLE Salary (
	DoctorID varchar(50),
    Salary varchar(50),
	FOREIGN KEY (DoctorID) REFERENCES Doctor(DoctorID)
);

DROP TABLE IF EXISTS Specialty;
CREATE TABLE Specialty (
	DoctorID varchar(50),
    Specialty varchar(50),
    FOREIGN KEY (DoctorID) REFERENCES Doctor(DoctorID)
);

DROP TABLE IF EXISTS Prescription;
CREATE TABLE Prescription (
	Prescription_ID int NOT NULL,
    Drug_Name varchar(50),
    Dosage varchar(50),
    Number_Refill int,
    Date_Prescribed DATE,
    Most_Recent_Filling DATE,
    Prescribed_by varchar(50),
    Patient_SSN int NOT NULL,
    FOREIGN KEY (Patient_SSN) REFERENCES Patient(SSN)
    );

/* 1NF FOR PRESCRIPTION TABLE */
ALTER TABLE Prescription
ADD PRIMARY KEY (Prescription_ID);

/* 2NF FOR PRESCRIPTION TABLE */
ALTER TABLE Prescription
DROP COLUMN Dosage;

DROP TABLE IF EXISTS Drug;
CREATE TABLE Drug (
	Drug_Name varchar(50) PRIMARY KEY,
    Dosage varchar(50)
    );

ALTER TABLE Prescription
ADD FOREIGN KEY (Drug_Name) REFERENCES Drug(Drug_Name);

/* 3NF FOR PRESCRIPTION TABLE */
ALTER TABLE Prescription
DROP COLUMN Date_Prescribed;
ALTER TABLE Prescription
DROP COLUMN Prescribed_by;

DROP TABLE IF EXISTS Doctor_Prescribe;
CREATE TABLE Doctor_Prescribe (
	Prescription_ID INT NOT NULL,
    Date_Prescribed DATE,
    Prescribed_by varchar(50),
    FOREIGN KEY (Prescribed_by) REFERENCES Doctor(DoctorID)
); 
    
DROP TABLE IF EXISTS Appointment;
CREATE TABLE Appointment (
	Appointment_Number int NOT NULL PRIMARY KEY,
    Test_Given int NOT NULL,
    Patient_SSN int NOT NULL,
    Doctor_Name varchar(50),
    DoctorID varchar(50),
    Time TIME,
    Date DATE,
    Room_Number int,
    FOREIGN KEY (Patient_SSN) REFERENCES Patient(SSN),
    FOREIGN KEY (Doctor_Name) REFERENCES Doctor(First_Name),
    FOREIGN KEY (DoctorID) REFERENCES Doctor(DoctorID)
    );
	
DROP TABLE IF EXISTS Medical_Test;
CREATE TABLE Medical_Test (
	Test_ID int NOT NULL PRIMARY KEY,
    Doctor_Name varchar(50),
    DoctorID varchar(50),
    Test_Type varchar(50),
    Result varchar(50),
    Patient_SSN int NOT NULL,
    Date_Given DATE,
    FOREIGN KEY (Doctor_Name) REFERENCES Doctor(First_Name),
    FOREIGN KEY (DoctorID) REFERENCES Doctor(DoctorID),
    FOREIGN KEY (Patient_SSN) REFERENCES Patient(SSN)
    );
    
DROP TABLE IF EXISTS Audit;
CREATE TABLE Audit (
	DoctorID varchar(50),
    Doctor_Name varchar(50),
    Action varchar(50),
    Specialty varchar(50),
    Date_Modified DATE
    );
    
    -- alter later
    -- FOREIGN KEY (Date_Prescribed) REFERENCES Appointment(Date)
    -- FOREIGN KEY (Test_Given) REFERENCES Medical_Test(Test_ID),
    
-- Alter table Prescription
-- ADD FOREIGN KEY (Date_Prescribed) references Appointment(Date);

Alter table Appointment
ADD FOREIGN KEY (Test_Given) REFERENCES Medical_Test(Test_ID);

-- view for question 2 and 3
-- 2. Doctor Robert Stevens is retiring. We need to inform all his patients and ask them 
-- to select a new doctor. For this purpose, Create a VIEW that finds the names and Phone 
-- numbers of all of Robert's patients.
-- 3. Create a view that has the First Names, Last Names of all doctors who gave out 
-- prescriptions for Vicodin.

-- INSERT INTO PATIENT WITH RANDOM NAME

/* modified Patient = Seo */
INSERT INTO Patient VALUES
('123456789', 'Seo', '7147147809', 'John', 'FD11');
INSERT INTO Insurance VALUES
('11112222', 'John');
INSERT INTO Location VALUES
('FD11', 'Flamingo Drive', '1888', 'Costa Mesa', 'CA', '92626');

/* modified Patient = Griffin */
INSERT INTO Patient VALUES
('223456789', 'Griffin', '7147147449', 'Peter', 'CD11');
INSERT INTO Insurance VALUES
('11112223', 'Peter');
INSERT INTO Location VALUES
('CD11', 'Culvir Drive', '1348', 'Irvine', 'CA', '92602');

/* modified Patient */
INSERT INTO Patient VALUES
('323456789', 'Griffin', '7147147819', 'Stewie', 'AD11');
INSERT INTO Insurance VALUES
('11112224', 'Stewie');
INSERT INTO Location VALUES
('AD11', 'Alton Drive', '1228', 'Costa Mesa', 'CA', '92626');

/* modified Patient */
INSERT INTO Patient VALUES
('423456789', 'Glenn', '7147147809', 'Quagmire', 'FD12');
INSERT INTO Insurance VALUES
('11112225', 'Quagmire');
INSERT INTO Location VALUES
('FD12', 'Flamingo Drive', '1088', 'Costa Mesa', 'CA', '92626');

/* modified patient */
INSERT INTO Patient VALUES
('523456789', 'Griffin', '7145907809', 'Brian', 'SC11');
INSERT INTO Insurance VALUES
('11112226', 'Brian');
INSERT INTO Location VALUES
('SC11', 'South Coast Drive', '1188', 'Costa Mesa', 'CA', '92626');

/* modified patient */
INSERT INTO Patient VALUES
('623456789', 'Swanson', '7147232244', 'Bonnie', 'FD13');
INSERT INTO Insurance VALUES
('11112227', 'Bonnie');
INSERT INTO Location VALUES
('FD13', 'Flamingo Drive', '1008', 'Costa Mesa', 'CA', '92626');

/* modified patient */
INSERT INTO Patient VALUES
('723456789', 'West', '7147143439', 'Adam', 'FD14');
INSERT INTO Insurance VALUES
('11112228', 'Adam');
INSERT INTO Location VALUES
('FD14', 'Flamingo Drive', '1828', 'Costa Mesa', 'CA', '92626');

/* Modified Patient */
INSERT INTO Patient VALUES
('823456789', 'Brown', '7147147809', 'Cleveland', 'AD12');
INSERT INTO Insurance VALUES
('11112229', 'Cleveland');
INSERT INTO Location VALUES
('AD12', 'Auburn Drive', '1820', 'Anaheim', 'CA', '92804');

/* Modified Patient */
INSERT INTO Patient VALUES
('923456789', 'Swanson', '7147123344', 'Joe', 'FD15');
INSERT INTO Insurance VALUES
('11112210', 'Joe');
INSERT INTO Location VALUES
('FD15', 'Flamingo Drive', '1008', 'Costa Mesa', 'CA', '92626');

/* Modified Patient */
INSERT INTO Patient VALUES
('133456789', 'Henry', '7147143299', 'Mike', 'CD12');
INSERT INTO Insurance VALUES
('11112232', 'Mike');
INSERT INTO Location VALUES
('CD12', 'Culvir Drive', '2342', 'Irvine', 'CA', '92633');

/* Modified Patient */
INSERT INTO Patient VALUES
('143456789', 'William', '7147883234', 'Roe', 'AH11');
INSERT INTO Insurance VALUES
('11112242', 'Roe');
INSERT INTO Location VALUES
('AH11', 'Anaheim Street', '3444', 'Long Beach', 'CA', '90805');

/* Modified Patient */
INSERT INTO Patient VALUES
('153456789', 'Holland', '7147228843', 'Tom', 'AH12');
INSERT INTO Insurance VALUES
('11112252', 'Tom');
INSERT INTO Location VALUES
('AH12', '46th Street', '1011', 'Long Beach', 'CA', '90805');

/* Modified Patient */
INSERT INTO Patient VALUES
('163456789', 'Kai', '7147247899', 'Xiuying', 'AH13');
INSERT INTO Insurance VALUES
('11112262', 'Xiuying');
INSERT INTO Location VALUES
('AH13', 'Anaheim Street', '1986', 'Long Beach', 'CA', '90805');

/* Modified Patient */
INSERT INTO Patient VALUES
('173456789', 'Yem', '7147247138', 'Danny', 'AH14');
INSERT INTO Insurance VALUES
('11112272', 'Danny');
INSERT INTO Location VALUES
('AH14', 'Anaheim Street', '1822', 'Long Beach', 'CA', '90805');





-- INSERT INTO DOCTOR WITH RANDOM NAME
/* modified doctor Robert */
INSERT INTO Doctor VALUES
('RS5678', 'Stevens', 'Robert', 'Allergy and Immunology', '6598283244');
INSERT INTO Salary VALUES
('RS5678', '310000');
INSERT INTO Specialty VALUES
('RS5678', 'Allergy and Immunology');

/* modified doctor Rezze */
INSERT INTO Doctor VALUES
('RT5677', 'Tom', 'Rezze', 'Anesthesiology', '6593893845');
INSERT INTO Salary VALUES
('RT5677', '310000');
INSERT INTO Specialty VALUES
('RT5677', 'Anesthesiology');

/* modified doctor Thomas */
INSERT INTO Doctor VALUES
('TC5678', 'Cruiz', 'Tommas', 'Dermatology', '7147258843');
INSERT INTO Salary VALUES
('TC5678', '290000');
INSERT INTO Specialty VALUES
('TC5678', 'Dermatology');

/* Modified Doctor David */
INSERT INTO Doctor VALUES
('DT5678', 'Tan', 'David', 'Pahtology', '6598224244');
INSERT INTO Salary VALUES
('DT5678', '410000');
INSERT INTO Specialty VALUES
('DT5678', 'Pahtology');

/* Modified Doctor Ryan */
INSERT INTO Doctor VALUES
('RP3678', 'Piseth', 'Ryan', 'Internal Medicine', '6598283244');
INSERT INTO Salary VALUES
('RP3678', '310000');
INSERT INTO Specialty VALUES
('RP3678', 'Internal Medicine');

/* Modified Doctor Steve */
INSERT INTO Doctor VALUES
('ST2048', 'Gates', 'Steve', 'Psychiatry', '6598284336');
INSERT INTO Salary VALUES
('ST2048', '410000');
INSERT INTO Specialty VALUES
('ST2048', 'Psychiatry');


/* Modified Doctor Lamia */
INSERT INTO Doctor VALUES
('LD2033', 'Dris', 'Lamia', 'Cardiologist', '7147233783');
INSERT INTO Salary VALUES
('LD2033', '410000');
INSERT INTO Specialty VALUES
('LD2033', 'Cardiologist');


/* Modified Doctor Rosa */
INSERT INTO Doctor VALUES
('RA4022', 'Andrade', 'Rosa', 'Physician', '7147338432');
INSERT INTO Salary VALUES
('RA4022', '510000');
INSERT INTO Specialty VALUES
('RA4022', 'Physician');

/* Modified Doctor Ronin */
INSERT INTO Doctor VALUES
('RE5993', 'Enderson', 'Ronin', 'Endocrinologists', '7147284844');
INSERT INTO Salary VALUES
('RE5993', '430000');
INSERT INTO Specialty VALUES
('RE5993', 'Endocrinologists');

/* Modified Doctor Jooby */
INSERT INTO Doctor VALUES
('JB3324', 'Babu', 'Jooby', 'Pulmonologist', '5089823444');
INSERT INTO Salary VALUES
('JB3324', '550000');
INSERT INTO Specialty VALUES
('JB3324', 'Pulmonologist');

/* Modified Doctor John */
INSERT INTO Doctor VALUES
('JS2011', 'Smith', 'John', 'Family Doctor', '7147227411');
INSERT INTO Salary VALUES
('JS2011', '320000');
INSERT INTO Specialty VALUES
('JS2011', 'Family Doctor');

/* Modified Doctor With no Specialty */
INSERT INTO Doctor VALUES
('PM3033', 'McKinnon', 'Peter', '', '713722739');
INSERT INTO Salary VALUES
('PM3033', '460000');
INSERT INTO Specialty VALUES
('PM3033', '');

INSERT INTO Doctor VALUES
('JS3003', 'Sombath', 'June', '', '713725549');
INSERT INTO Salary VALUES
('JS3003', '400000');
INSERT INTO Specialty VALUES
('JS3003', '');

INSERT INTO Doctor VALUES
('LK1034', 'King', 'Luke', '', '713720039');
INSERT INTO Salary VALUES
('LK1034', '350000');
INSERT INTO Specialty VALUES
('LK1034', '');



-- INSERT INTO PRESCRIPTION

/* Modified Certirizin */
INSERT INTO Prescription VALUES
('0001', 'Certirizin', '1', '2022-10-22', '623456789');
INSERT INTO Drug VALUES
('Certirizin', '10 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0001', '2022-10-22', 'RS5678');

/* Modified Atorvastatin */
INSERT INTO Prescription VALUES
('0002', 'Atorvastatin', '1', '2022-9-22', '723456789');
INSERT INTO Drug VALUES
('Atorvastatin', '10 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0002', '2022-9-22', 'LD2033');

/* Modified Amoxicillin */
INSERT INTO Prescription VALUES
('0003', 'Amoxicillin', '1', '2022-10-22', '823456789');
INSERT INTO Drug VALUES
('Amoxicillin', '750 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0003', '2022-10-01', 'RA4022');

/* Modified Lisinopril */
INSERT INTO Prescription VALUES
('0004', 'Lisinopril', '1', '2022-10-22', '133456789');
INSERT INTO Drug VALUES
('Lisinopril', '10 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0004', '2022-8-14', 'LD2033');

/* Modified Lisinopril */
INSERT INTO Prescription VALUES
('0005', 'Levothyroxine', '1', '2022-11-12', '523456789');
INSERT INTO Drug VALUES
('Levothyroxine', '25 mcg/day');
INSERT INTO Doctor_Prescribe VALUES
('0005', '2022-9-20', 'RE5993');

/* Modified Lisinopril */
INSERT INTO Prescription VALUES
('0006', 'Albuterol', '1', '2022-9-22', '523456789');
INSERT INTO Drug VALUES
('Albuterol', '10 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0006', '2022-8-22', 'JB3324');

/* Modified Metformin */
INSERT INTO Prescription VALUES
('0007', 'Metformin', '1', '2022-10-16', '823456789');
INSERT INTO Drug VALUES
('Metformin', '1000 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0007', '2022-8-22', 'RE5993');

/* Modified Amlodipine */
INSERT INTO Prescription VALUES
('0008', 'Amlodipine', '1', '2022-10-12', '523456789');
INSERT INTO Drug VALUES
('Amlodipine', '10 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0008', '2022-8-12', 'LD2033');

/* Modified Metoprolol */
INSERT INTO Prescription VALUES
('0009', 'Metoprolol', '1', '2022-10-18', '423456789');
INSERT INTO Drug VALUES
('Metoprolol', '100 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0009', '2022-9-18', 'LD2033');

/* Modified Omeprazole */
INSERT INTO Prescription VALUES
('0010', 'Omeprazole', '1', '2022-10-15', '223456789');
INSERT INTO Drug VALUES
('Omeprazole', '40 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0010', '2022-9-15', 'JS2011');

/* Modified Omeprazole */
INSERT INTO Prescription VALUES
('0011', 'Losartan', '1', '2022-11-19', '623456789');
INSERT INTO Drug VALUES
('Losartan', '50 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0011', '2022-10-19', 'LD2033');

/* Modified Antihistamine */
INSERT INTO Prescription VALUES
('0012', 'Antihistamine', '1', '2022-11-19', '143456789');
INSERT INTO Drug VALUES
('Antihistamine', '50 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0012', '2022-9-19', 'RS5678');

/* Modified Pseudoephedrine */
INSERT INTO Prescription VALUES
('0013', 'Pseudoephedrine', '1', '2022-10-11', '153456789');
INSERT INTO Drug VALUES
('Pseudoephedrine', '60 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0013', '2022-9-11', 'RS5678');

/* Modified Corticosteroids */
INSERT INTO Prescription VALUES
('0014', 'Corticosteroids', '1', '2022-11-13', '163456789');
INSERT INTO Drug VALUES
('Corticosteroids', '9 mg/day');
INSERT INTO Doctor_Prescribe VALUES
('0014', '2022-10-13', 'RS5678');

/* Modified Nedocromil */
INSERT INTO Prescription VALUES
('0015', 'Nedocromil', '1', '2022-10-19', '173456789');
INSERT INTO Drug VALUES
('Nedocromil', '1-2 drops/day');
INSERT INTO Doctor_Prescribe VALUES
('0015', '2022-9-19', 'RS5678');

/* Modified Vicodin */
INSERT INTO Prescription VALUES
('0016', 'Vicodin', '1', '2022-11-11', '163456789');
INSERT INTO Drug VALUES
('Vicodin', '1-2 Capsules/day');
INSERT INTO Doctor_Prescribe VALUES
('0016', '2022-10-11', 'JS2011');

/* Modified Vicodin */
INSERT INTO Prescription VALUES
('0017', 'Vicodin', '1', '2022-12-12', '153456789');
INSERT INTO Doctor_Prescribe VALUES
('0017', '2022-11-12', 'RA4022');

/* Modified Vicodin */
INSERT INTO Prescription VALUES
('0018', 'Vicodin', '1', '2022-12-12', '823456789');
INSERT INTO Doctor_Prescribe VALUES
('0018', '2022-11-12', 'RP3678');


-- INSERT INTO APPOINTMENT
INSERT INTO Appointment VALUES 
('0001', '1', '623456789', 'Robert', 'RS5678', '16:00:00', '2022-10-22', '1');
INSERT INTO Appointment VALUES 
('0002', '1', '723456789', 'Lamia', 'LD2033', '11:30:00', '2022-9-22', '1');
INSERT INTO Appointment VALUES 
('0003', '1', '823456789', 'Rosa', 'RA4022', '10:00:00', '2022-10-01', '1');
INSERT INTO Appointment VALUES 
('0004', '1', '143456789', 'Robert', 'RS5678', '17:00:00', '2022-9-19', '1');
INSERT INTO Appointment VALUES 
('0005', '1', '223456789', 'John', 'JS2011', '10:00:00', '2022-9-15', '1');
INSERT INTO Appointment VALUES 
('0006', '1', '523456789', 'Jooby', 'JB3324', '14:00:00', '2022-8-22', '1');
INSERT INTO Appointment VALUES 
('0007', '1', '163456789', 'John', 'JS2011', '16:00:00', '2022-10-11', '1');
INSERT INTO Appointment VALUES 
('0008', '1', '823456789', 'Ryan', 'RP3678', '15:00:00', '2022-11-12', '1');

-- INSERT INTO MEDICAL TEST

INSERT INTO Medical_Test VALUES
('0001', 'Robert', 'RS5678', 'Allergy Test', 'good', '623456789', '2022-10-22');
INSERT INTO Medical_Test VALUES
('0002', 'Lamia', 'LD2033', 'Blood Test', 'good', '723456789', '2022-9-22');
INSERT INTO Medical_Test VALUES
('0003', 'Robert', 'RS5678', 'Blood Pressure', 'not good', '143456789', '2022-9-19');
INSERT INTO Medical_Test VALUES
('0004', 'John', 'JS2011', 'Monthly Checkup', 'good', '223456789', '2022-9-15');
INSERT INTO Medical_Test VALUES
('0005', 'Rosa', 'RA4022', 'Weekly Checkup', 'good', '823456789', '2022-10-01');
