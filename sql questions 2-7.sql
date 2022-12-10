
/* Question #2 */
SELECT Patient.First_Name, Patient.Last_Name, Patient.PhoneNumber
FROM ((Patient
INNER JOIN Appointment ON Patient.SSN = Appointment.Patient_SSN AND Appointment.DoctorID = 'RS5678')
INNER JOIN Medical_Test ON Patient.SSN = Medical_Test.Patient_SSN AND Medical_Test.DoctorID = 'RS5678');

/* Question #3 */
SELECT Doctor.First_Name, Doctor.Last_Name, Prescription.Drug_Name
FROM Doctor, Prescription, Doctor_Prescribe
WHERE Doctor.DoctorID = Doctor_Prescribe.Prescribed_by
AND Prescription.Prescription_ID = Doctor_Prescribe.Prescription_ID
AND Prescription.Drug_Name = 'Vicodin';

######################################################################################
#4 create a view that has name and specialty of all doctors

select doctor.First_Name, doctor.Last_Name, Specialty.specialty
from Doctor, specialty
where doctor.doctorid = specialty.doctorid and Specialty.specialty is not null;

######################################################################################
#5 modify the view for q4

select doctor.first_name, doctor.Last_name, specialty.specialty
from doctor, specialty
where doctor.doctorid = specialty.doctorid;

######################################################################################
#6 Create a trigger on the Doctor specialty....

drop trigger if exists DoctorSpecialty;
drop trigger if exists Doctorspecialty_update;

delimiter #
create trigger DoctorSpecialty after insert on Doctor
for each row begin
insert into Audit(DoctorID, Doctor_Name, Action, Specialty, Date_Modified) values (new.doctorid, NEW.`First_Name`, "added", NEW.Specialty, curdate());
end #

create trigger Doctorspecialty_update after update on Doctor
for each row begin
insert into Audit(DoctorID, Doctor_Name, Action, Specialty, Date_Modified) values (new.doctorid, NEW.`First_Name`, "updated", NEW.Specialty, curdate());
end #
delimiter ;

######################################################################################
#7 backup all tables if not first time remove backup and take new ones
DROP TABLE IF EXISTS appointment_backup;
create table appointment_backup as select * from appointment;
DROP TABLE IF EXISTS aduit_backup;
create table aduit_backup as select * from audit;
DROP TABLE IF EXISTS doctor_backup;
create table doctor_backup as select * from doctor;
DROP TABLE IF EXISTS doctor_prescribe_backup;
create table doctor_prescribe_backup as select * from doctor_prescribe;
DROP TABLE IF EXISTS drug_backup;
create table drug_backup as select * from drug;
DROP TABLE IF EXISTS insurance_backup;
create table insurance_backup as select * from insurance;
DROP TABLE IF EXISTS location_backup;
create table location_backup as select * from location;
DROP TABLE IF EXISTS medical_test_backup;
create table medical_test_backup as select * from medical_test;
DROP TABLE IF EXISTS patient_backup;
create table patient_backup as select * from patient;
DROP TABLE IF EXISTS prescription_backup;
create table prescription_backup as select * from prescription;
DROP TABLE IF EXISTS salary_backup;
create table salary_backup as select * from salary;
DROP TABLE IF EXISTS specialty_backup;
create table specialty_backup as select * from specialty;
