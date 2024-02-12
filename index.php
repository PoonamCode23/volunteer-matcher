<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Application Form</title>
</head>

<body>
    <h2 class="title">Application Form</h2>
    <div class="container mt-4">
        <form method="post" action="calculate.php" id="submitForm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="age" class="form-label" >Age</label>
                    <input type="number" min="16" max="50" class="form-control" id="age" name="age" placeholder="Enter Age">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                </div>
                <div class="col-md-6">
                    <label for="availableTime" class="form-label">Available Time</label>
                    <input type="text" class="form-control" id="availableTime" name="availableTime" placeholder="Enter Available Time">
                </div>
            </div>
            <div class="mb-5">
                <label for="hours" class="form-label">Necessary Number of Hours</label>
                <input type="text" class="form-control" id="hours" name ="hours" placeholder="Enter Necessary Number of Hours">
            </div>

            <div class="mb-4">
                <input type="hidden" id="rankingsInput" name="rankings" />
                <label for="preferences" class="form-label">Preferences</label>
                <p>Arrange your preferred organizations by simply dragging and dropping them in your order of preference:</p>
                <ul id="sortable" class="organization-list">
                    <li class="ui-state-default" data-id="Tewa">Tewa </li>
                    <li class="ui-state-default" data-id="Aloki">Aloki Care Home (old age home)</li>
                    <li class="ui-state-default" data-id="AmaDablam">Ama Dablam</li>
                    <li class="ui-state-default" data-id="Navakiran">Navakiran Children Home (orphanage)</li>
                </ul>
            </div>


            <div class="mb-5">
                <label for="age" class="form-label">Field of Study</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="medicalRadio" value="Medical">
                    <label class="form-check-label" for="medicalRadio">Medical</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="engineeringRadio" value="Engineering">
                    <label class="form-check-label" for="engineeringRadio">Engineering</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="teachingRadio" value="Teaching">
                    <label class="form-check-label" for="teachingRadio">Teaching</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="financeRadio" value="Finance/Business">
                    <label class="form-check-label" for="financeRadio">Finance/Business</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="artRadio" value="Art">
                    <label class="form-check-label" for="artRadio">Art</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="musicRadio" value="Music">
                    <label class="form-check-label" for="musicRadio">Music</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fieldOfStudy" id="lawRadio" value="Law">
                    <label class="form-check-label" for="lawRadio">Law</label>
                </div>
            </div>


            <div class="mb-4">
                <label for="age" class="form-label">How well do you get along with kids?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kidsInteraction" id="badRadio" value="bad">
                    <label class="form-check-label" for="badRadio">Bad</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kidsInteraction" id="decentRadio" value="decent">
                    <label class="form-check-label" for="decentRadio">Decent</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="kidsInteraction" id="goodRadio" value="good">
                    <label class="form-check-label" for="goodRadio">Good</label>
                </div>
            </div>

            <div class="mb-5">
                <label for="age" class="form-label">How well do you get along with elderly?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="elderlyInteraction" id="badRadio" value="bad">
                    <label class="form-check-label" for="badRadio">Bad</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="elderlyInteraction" id="decentRadio" value="decent">
                    <label class="form-check-label" for="decentRadio">Decent</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="elderlyInteraction" id="goodRadio" value="good">
                    <label class="form-check-label" for="goodRadio">Good</label>
                </div>
            </div>


            <div class="mb-5">
                <label for="skills" class="form-label">Skills Ratings</label>
                <p>Adjust the slider to rate your skills on a scale from one to five.</p>

                <div class="form-group mb-3">
                    <label for="teaching">Teaching:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="teaching" name="teaching"  oninput="updateValue('teaching')">
                    <span id="teachingValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="patience">Patience:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="patience" name="patience"  oninput="updateValue('patience')">
                    <span id="patienceValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="socialSkills">Social Skills:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="socialSkills" name="socialSkills"  oninput="updateValue('socialSkills')">
                    <span id="socialSkillsValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="nepaliProficiency">Nepali Proficiency:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="nepaliProficiency" name="nepaliProficiency"  oninput="updateValue('nepaliProficiency')">
                    <span id="nepaliProficiencyValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="englishProficiency">English Proficiency:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="englishProficiency" name="englishProficiency"  oninput="updateValue('englishProficiency')">
                    <span id="englishProficiencyValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="creativity">Creativity:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="creativity" name="creativity"  oninput="updateValue('creativity')">
                    <span id="creativityValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="teamCoordination">Team Coordination:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="teamCoordination" name="teamCoordination"  oninput="updateValue('teamCoordination')">
                    <span id="teamCoordinationValue">1</span>
                </div>

                <div class="form-group mb-3">
                    <label for="fundraising">Fundraising:</label>
                    <input type="range" min="1" max="5" value="1" class="form-control-range" id="fundraising" name="fundraising"  oninput="updateValue('fundraising')">
                    <span id="fundraisingValue">1</span>
                </div>

            </div>

            <div class="mb-5">
                <label for="age" class="form-label">What current issues interest you the most from the following?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="interests" id="womenEmpowermentRadio" value="Women's Empowerment">
                    <label class="form-check-label" for="womenEmpowermentRadio">Women's Empowerment</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="interests" id="illiteracyRadio" value="Illiteracy">
                    <label class="form-check-label" for="illiteracyRadio">Illiteracy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="interests" id="medicalCrisisRadio" value="Medical Crisis">
                    <label class="form-check-label" for="medicalCrisisRadio">Medical Crisis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="interests" id="childWelfareRadio" value="Child Welfare">
                    <label class="form-check-label" for="childWelfareRadio">Child Welfare</label>
                </div>
            </div>


            <label for="exampleTextarea" class="form-label">Additional information you would like to send to the organization you are matched with</label>
            <textarea class="form-control" name="additionalInformation" id="exampleTextarea" rows="3" placeholder="Any other skills that may help"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="script.js"></script>

</body>

</html>
