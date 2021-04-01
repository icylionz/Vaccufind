function appointmentCompletion(int patientID) {
	patientCompleted = searchForPatientByID(patientID);
	
	patientCompleted.remainingDoses = patientCompleted.remainingDoses - 1;

	if (patientCompleted.remainingDoses > 0) {
		vaccinePatientHas = searchForVaccineByType(patientCompleted.vaccineType);
		scheduleAppointment(patientCompleted, vaccinePatientHas.lengthOfTimeBetweenDoses);
	} else {
		patientComplated.appintmentDate() = " ";
	}
	updatePatientInfo(patientCompleted);
}