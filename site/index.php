<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <title>Home</title>
</head>
<body>  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <div class="bg-dark text-white text-center p-2">
    <a href="https://github.com/frankvoc/SE266.05" class="text-white" target="_blank">
      <i class="fab fa-github mr-2"></i> GitHub Repo
    </a>
  </div>
  <div class="container mt-5">
    <div class="accordion" id="weekAccordion">
      <div class="card">
        <div class="card-header" id="week1Heading">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#week1Collapse" aria-expanded="false" aria-controls="week1Collapse">
              Week 1
            </button>
          </h2>
        </div>
        <div id="week1Collapse" class="collapse show" aria-labelledby="week1Heading" data-parent="#weekAccordion">
          <div class="list-group">
          <div class="list-group">
              <a href="../week1/week1G.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100">
                  <h5 class="mb-1">Week 1 Assignment. <i>FizzBuzz</i></h5>
                  <small class="text-muted">10/2/2023</small>
                  <p class="mb-1">Using PHP to solve FizzBuzz, where if the number is a multiple of 2 it will be Fizz. If the number is a multiple of 3 then it will be Buzz. If the number is a multiple of both it will be FizzBuzz.</p>
                </div>
              </a>
              <a href="../week1/week1C.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 1 Assignment. <i>Basic Arrays</i></h5>
                  <small class="text-muted">10/2/2023</small>
                  <p class="mb-1">Using PHP I created a very basic array of animals and printed them to the screen.</p>
                </div>
              </a>
              <a href="../week1D.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 1 Assignment. <i>Associative Arrays</i></h5>
                  <small class="text-muted">10/2/2023</small>
                  <p class="mb-1">Using PHP I created a very basic Associative Array tasks and printed them out in different ways to the screen.</p>
                </div>
              </a>
              <a href="../week1/week1E.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 1 Assignment. <i>Booleans</i></h5>
                  <small class="text-muted">10/2/2023</small>
                  <p class="mb-1">Using PHP I created a very basic Associative Array tasks and printed them out in different ways to the screen. We then used Boolean for 'completed' and displayed either a <span>&#9989</span> for a completed task or a <span>&#10060</span> for an incomplete task.</p>
                </div>
              </a>
              <a href="../week1/week1F.php" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 1 Assignment. <i>Functions</i></h5>
                  <small class="text-muted">10/2/2023</small>
                  <p class="mb-1">Using PHP I created a very basic function canEnterClub and passed a person's age through them. If they are 21 or over they can enter (returns true) or under 21 (returns false). Then we passed ages through the function and it returned Booleans. These were distinguished by <span>&#9989</span> for being able to enter or a <span>&#10060</span> for not being able to enter.</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="week2Heading">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#week2Collapse" aria-expanded="true" aria-controls="week2Collapse">
              Week 2
            </button>
          </h2>
        </div>
        <div id="week2Collapse" class="collapse" aria-labelledby="week2Heading" data-parent="#weekAccordion">
          <div class="list-group">
          <a href="../patient/index.html" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 2 Assignment. <i>Patient Form</i></h5>
                  <small class="text-muted">10/25/2023</small>
                  <p class="mb-1">Our assignment was to create a basic patient intake form. We then used validation and displayed the information along with a classification of the person.</p>
                </div>
              </a>
          </div>
        </div>
        <div class="card">
        <div class="card-header" id="week3Heading">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#week3Collapse" aria-expanded="true" aria-controls="week3Collapse">
              Week 3
            </button>
          </h2>
        </div>
        <div id="week3Collapse" class="collapse" aria-labelledby="week3Heading" data-parent="#weekAccordion">
          <div class="list-group">
            <a href="../week2/atm_starter.php">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Week 3 Assignment. <i>ATM</i></h5>
                  <small class="text-muted">11/2/2023</small>
                  <p class="mb-1">Our assignment for Week 3 was to create a functioning ATM. For this program I used session variables to store the changing ammounts of the checking and savings account</p></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <footer class="bg-dark text-white text-center py-3" style="position: fixed; bottom: 0; left: 0; right: 0;">
    <div>&copy; 2023 FVocatura </div>
  </footer>
</body>
</html>

