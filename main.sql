CREATE TABLE IF NOT EXISTS student_marklist(
  Student_marklist_id int(11) NOT NULL,
  student rollno int(11) NOT NULL,
  student_name varchar(250) NOT NULL,
  student_mark int(11) NOT NULL, 
  student_password BINARY(64) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO 'student_marklist' ('student_marklist_id', 'student_rollno', 'student_name','student_password') VALUES(@student_marklist_id,@student_rollno,@student_name,@student_mark,HASHBYTES('SHA2_512', @student_password))

ALTER TABLE 'student_marklist'
  ADD PRIMARY KEY ('student_marklist_id');


ALTER TABLE 'student_marklist'
  MODIFY 'student_marklist_id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;


CSV file:

Studentsmarklist.csv


1, 101, 'Ram',95,'123'
2, 102, 'Siva',88,'123'
3, 103, 'Ravi',94,'123'
4, 104, 'Mahesh',67,'123'
5, 105, 'Hari',85,'123'
6, 106, 'Sakthi',100,'123'
7, 107, 'Praveen',71,'123'
8, 108, 'Varun',78,'123'
9, 109, 'Karthik',92,'123'
10, 110, 'Rithik',89,'123'
