DROP DATABASE IF EXISTS docOffice;
CREATE DATABASE docOffice;
SET FOREIGN_KEY_CHECKS=0;
USE docOffice;

DROP TABLE IF EXISTS Patient;
CREATE TABLE Patient (
  SSN int NOT NULL PRIMARY KEY,
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

DROP TABLE IF EXISTS Doctor;
CREATE TABLE Doctor (
	DoctorID varchar(50) PRIMARY KEY,
    Last_Name varchar(50),
    First_Name varchar(50),
    Phone_Number varchar(10),
    Specialty varchar(40),
    Salary varchar(40),
    UNIQUE (First_Name),
    UNIQUE (Specialty)
    );

DROP TABLE IF EXISTS Prescription;
CREATE TABLE Prescription (
	Prescription_ID int NOT NULL PRIMARY KEY,
    Drug_Name varchar(50),
    Dosage varchar(50),
    Number_Refill int,
    Date_Prescribed DATE,
    Most_Recent_Filling DATE,
    Prescribed_by varchar(50),
    Patient_SSN int NOT NULL,
    FOREIGN KEY (Patient_SSN) REFERENCES Patient(SSN),
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
    Date_Modified DATE,
    FOREIGN KEY (DoctorID) REFERENCES Doctor(DoctorID),
    FOREIGN KEY (Doctor_Name) REFERENCES Doctor(First_Name),
    FOREIGN KEY (Specialty) REFERENCES Doctor(Specialty)
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
INSERT INTO Patient VALUES 
('123456789', 'Seo', '7147147809', 'Flamingo Drive', '1888', 'Costa Mesa', 'CA', '92626', 'John', '11112222');
INSERT INTO Patient VALUES 
('223456789', 'Griffin', '7147147449', 'Culvir Drive', '1348', 'Irvine', 'CA', '92602', 'Peter', '11112223');
INSERT INTO Patient VALUES 
('323456789', 'Griffin', '7147147819', 'Alton Drive', '1228', 'Costa Mesa', 'CA', '92626', 'Stewie', '11112224');
INSERT INTO Patient VALUES 
('423456789', 'Glenn', '7147147809', 'Flamingo Drive', '1088', 'Costa Mesa', 'CA', '92626', 'Quagmire', '11112225');
INSERT INTO Patient VALUES 
('523456789', 'Griffin', '7145907809', 'South Coast Drive', '1188', 'Costa Mesa', 'CA', '92626', 'Brian', '11112226');
INSERT INTO Patient VALUES 
('623456789', 'Swanson', '7147232244', 'Flamingo Drive', '1008', 'Costa Mesa', 'CA', '92626', 'Bonnie', '11112227');
INSERT INTO Patient VALUES 
('723456789', 'West', '7147143439', 'Flamingo Drive', '1828', 'Costa Mesa', 'CA', '92626', 'Adam', '11112228');
INSERT INTO Patient VALUES 
('823456789', 'Brown', '7147147809', 'Auburn Drive', '1820', 'Anaheim', 'CA', '92804', 'Cleveland', '11112229');
INSERT INTO Patient VALUES 
('923456789', 'Swanson', '7147123344', 'Flamingo Drive', '1008', 'Costa Mesa', 'CA', '92626', 'Joe', '11112210');
INSERT INTO Patient VALUES 
('133456789', 'Henry', '7147143299', 'Culvir Drive', '2342', 'Irvine', 'CA', '92633', 'Mike', '11112232');
INSERT INTO Patient VALUES
('143456789', 'William', '7147883234', 'Anaheim Street', '3444', 'Long Beach', 'CA', '90805', 'Roe', '11112242');
INSERT INTO Patient VALUES
('153456789', 'Holland', '7147228843', '46th Street', '1011', 'Long Beach', 'CA', '90805', 'Tom', '11112252');
INSERT INTO Patient VALUES
('163456789', 'Kai', '7147247899', 'Anaheim Street', '1986', 'Long Beach', 'CA', '90805', 'Xiuying', '11112262');
INSERT INTO Patient VALUES
('173456789', 'Yem', '7147247138', 'Anaheim Street', '1822', 'Long Beach', 'CA', '90805', 'Danny', '11112272');



-- INSERT INTO DOCTOR WITH RANDOM NAME
INSERT INTO Doctor VALUES
('RS5678', 'Stevens', 'Robert', '6598283244', 'Allergy and Immunology', '310000');
INSERT INTO Doctor VALUES
('RT5677', 'Tom', 'Rezze', '6593893845', 'Anesthesiology', '310000');
INSERT INTO Doctor VALUES
('TC5678', 'Cruiz', 'Tommas', '7147258843', 'Dermatology', '290000');
INSERT INTO Doctor VALUES
('DT5678', 'Tan', 'David', '6598224244', 'Pahtology', '410000');
INSERT INTO Doctor VALUES
('RP3678', 'Piseth', 'Ryan', '6598283244', 'Internal Medicine', '310000');
INSERT INTO Doctor VALUES
('ST2048', 'Gates', 'Steve', '6598284336', 'Psychiatry', '410000');
INSERT INTO Doctor VALUES
('LD2033', 'Dris', 'Lamia', '7147233783', 'Cardiologist', '410000');
INSERT INTO Doctor VALUES
('RA4022', 'Andrade', 'Rosa', '7147338432', 'Physician', '510000');
INSERT INTO Doctor VALUES
('RE5993', 'Enderson', 'Ronin', '7147284844', 'Endocrinologists', '430000');
INSERT INTO Doctor VALUES
('JB3324', 'Babu', 'Jooby', '5089823444', 'Pulmonologist', '550000');
INSERT INTO Doctor VALUES
('JS2011', 'Smith', 'John', '7147227411', 'Family Doctor', '320000');

-- INSERT INTO PRESCRIPTION
INSERT INTO Prescription VALUES
('0001', 'Certirizin', '10 mg/day', '1', '2022-10-22', '2022-10-22', 'RS5678', '623456789');
INSERT INTO Prescription VALUES
('0002', 'Atorvastatin', '10 mg/day', '1', '2022-9-22', '2022-9-22', 'LD2033', '723456789');
INSERT INTO Prescription VALUES
('0003', 'Amoxicillin', '750 mg/day', '1', '2022-10-01', '2022-10-22', 'RA4022', '823456789');
INSERT INTO Prescription VALUES
('0004', 'Lisinopril', '10 mg/day', '1', '2022-8-14', '2022-10-22', 'LD2033', '133456789');
INSERT INTO Prescription VALUES
('0005', 'Levothyroxine', '25 mcg/day', '1', '2022-9-20', '2022-11-12', 'RE5993', '523456789');
INSERT INTO Prescription VALUES
('0006', 'Albuterol', '10 mg/day', '1', '2022-8-22', '2022-9-22', 'JB3324', '523456789');
INSERT INTO Prescription VALUES
('0007', 'Metformin', '1000 mg/day', '1', '2022-9-16', '2022-10-16', 'RE5993', '823456789');
INSERT INTO Prescription VALUES
('0008', 'Amlodipine', '10 mg/day', '1', '2022-8-12', '2022-10-12', 'LD2033', '523456789');
INSERT INTO Prescription VALUES
('0009', 'Metoprolol', '100 mg/day', '1', '2022-9-18', '2022-10-18', 'LD2033', '423456789');
INSERT INTO Prescription VALUES
('0010', 'Omeprazole', '40 mg/day', '1', '2022-9-15', '2022-10-15', 'JS2011', '223456789');
INSERT INTO Prescription VALUES
('0011', 'Losartan', '50 mg/day', '1', '2022-10-19', '2022-11-19', 'LD2033', '623456789');
INSERT INTO Prescription VALUES
('0012', 'Antihistamine', '50 mg/day', '1', '2022-9-19', '2022-11-19', 'RS5678', '143456789');
INSERT INTO Prescription VALUES
('0013', 'Pseudoephedrine', '60 mg/day', '1', '2022-9-11', '2022-10-11', 'RS5678', '153456789');
INSERT INTO Prescription VALUES
('0014', 'Corticosteroids', '9 mg/day', '1', '2022-10-13', '2022-11-13', 'RS5678', '163456789');
INSERT INTO Prescription VALUES
('0015', 'Nedocromil', '1-2 drops/day', '1', '2022-9-19', '2022-10-19', 'RS5678', '173456789');
INSERT INTO Prescription VALUES
('0016', 'Vicodin', '1-2 Capsules/day', '1', '2022-10-11', '2022-11-11', 'JS2011', '163456789');
INSERT INTO Prescription VALUES
('0017', 'Vicodin', '1-2 Capsule/day', '1', '2022-11-12', '2022-12-12', 'RA4022', '153456789');
INSERT INTO Prescription VALUES
('0018', 'Vocodin', '1-2 Capsule/day', '1', '2022-11-12', '2022-12-12', 'RP3678', '823456789');

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