<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - Create Service Request</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>

  </head>
  <body>
    <!-- SIDEBAR START -->
      <div class="ui inverted left vertical sidebar menu">
        <div class="item">
          <a class="ui logo icon image" href="#">
             
          </a>
          <a href="#">
            <b>Hive Resource Management System</b>
          </a>
        </div>
        <a class="item" href="../sales-index.php">
          <i class="home icon"></i>
          Sales Dashboard
        </a>
        <a class="item" href="create-service-requests.php">
          Create Service Requests
        </a>
        <a class="item" href="reschedule-service-requests.php">
          Reschedule Service Requests
        </a>
        <a class="item" href="../sales-chemicals/chemical.php">
          Chemical Inventory
        </a>
        <a class="item" href="sales-clients/clients-list.php">
          View Clients
        </a>
        <div class="item">
          <div class="header">
            Reports
          </div>
          <div class="menu">
            <a class="item" href="sales-reports/termite-treatment-report.php">
              Termite Treatment Report
            </a>
            <a class="item" href="sales-reports/household-treatment-report.php">
              Household Treatment Report
            </a>
            <a class="item" href="sales-reports/general-services-report.php">
              General Services Report
            </a>
            <a class="item" href="sales-reports/list-of-oculars-report.php">
              List of Oculars Report
            </a>
            <a class="item" href="sales-reports/accomplished-oculars-report.php">
              Accomplished Oculars Report
            </a>
            <a class="item" href="sales-resports/unaccomplished-oculars-report.php">
              Unaccomplished Oculars Report
            </a>
          </div>
        </div>
        <a class="item" href="../login.php">
          Log Out
        </a>
      </div>
      <!-- SIDEBAR END -->


      <!-- MAIN CONTENT START -->
      <div class="pusher">
        <!-- TOP BAR START-->
        <div class="sixteen wide column">
          <div class="ui top menu">
            <div class="ui header item launch button">
                <i class="icon list layout"></i>
            </div>
            <div class="item">
              Sales and Marketing Department
            </div>
            <div class="right menu ">
              <a class="ui labeled item notifications">
                Notifications
                 
              </a>
            </div>
          </div>
        </div>
        <!-- TOP BAR END -->
        <div class="ui basic padded segment">
          <div class="ui relaxed grid">
            <!-- NOTIFICATION FEED START -->
            <div class="ui special popup">
              <div class="eight wide column center aligned grid">
                  <div class="ui small feed">
                    <h4 class="ui header">Notifications</h4>
                    <div class="event">
                      <div class="content">
                        <div class="summary">
                          Ocular Inspection for <a>Job Order 1234</a> has been accomplished.
                        </div>
                      </div>
                    </div>
                    <div class="event">
                      <div class="content">
                        <div class="summary">
                          <a>Job Order 1234</a> has been accomplished.
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <!-- NOTIFICATION FEED END -->

            <!-- NEW CLIENTS START -->

            <!-- CLIENT TOGGLE START -->
            <div class="three wide centered column">
              <div class="ui padded segment">
                  <h3 class="ui centered header">Client Type</h3>
                    <div class="ui slider checkbox">
                      <input type="radio" name="slide-client" id="slide-new">
                      <label>New Client</label>
                    </div>
                    <br></br>
                    <div class="ui slider checkbox">
                      <input type="radio" name="slide-client" id="slide-existing">
                      <label>Existing Client</label>
                    </div>
              </div>
            </div>
            <!-- CLIENT TOGGLE END -->

            <div class="sixteen wide centered column new-clients">

              <div class="ui basic padded segment">
                <h3 class="ui centered header">New Clients</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form">
                    <div class="field">
                      <div class="fields">
                        <div class="eight wide field">
                          <label>First Name</label>
                          <input type="text" name="first-name" placeholder="First Name">
                        </div>
                        <div class="eight wide field">
                          <label>Last Name</label>
                          <input type="text" name="last-name" placeholder="Last Name">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Address</label>
                      <div class="fields">
                        <div class="twelve wide field">
                          <input type="text" name="address" placeholder="Address Line 1">
                        </div>
                        <div class="four wide field">
                          <input type="text" name="address-2" placeholder="Apt #">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Type of Service Requested</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Termite</label>
                      </div>
                      <br></br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Household</label>
                      </div>
                    </div>
                    <div class="field">
                      <label>Date Requested</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                          <input type="text" placeholder="Date">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Remarks</label>
                      <textarea rows="2" name="remarks"></textarea>
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- NEW CLIENTS END -->

            <!-- OLD CLIENTS START -->
            <div class="sixteen wide centered column existing-clients">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Existing Clients</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form">
                    <div class="field">
                      <label>Existing Clients</label>
                      <select class="ui search dropdown">
                        <option value="">Select Client</option>
                        <option value="#">Richard Parayno</option>
                        <option value="#">Sean Coronel</option>
                        <option value="#">Yuri Banawa</option>
                      </select>
                    </div>
                    <div class="field">
                      <label>Type of Service Requested</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Termite</label>
                      </div>
                      <br></br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Household</label>
                      </div>
                    </div>
                    <div class="field">
                      <label>Date Requested</label>
                      <div class="ui calendar" id="mycalendar">
                        <div class="ui input left icon">
                          <i class="calendar icon"></i>
                          <input type="text" placeholder="Date">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Remarks</label>
                      <textarea rows="2"></textarea>
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- OLD CLIENTS END -->
          </div>
        </div>
      </div>


      <!-- MAIN CONTENT END -->

      <!-- scripts -->
      <script>
      $('.existing-clients').css("display", "none");
      $('.new-clients').css("display", "none");


      $('#slide-existing').click(function() {
        $('.existing-clients').show();
        $('.new-clients').hide();
      });
      $('#slide-new').click(function() {
        $('.new-clients').show();
        $('.existing-clients').hide();
      });


      $('select.dropdown')
        .dropdown()
      ;


      $('.notifications')
        .popup({
          popup: $('.special.popup'),
          on: 'click',
          position: 'bottom right'
        })
      ;

      $('#mycalendar').calendar({
        type: 'date'
      })
      ;

      $(".ui.sidebar").sidebar()
                      .sidebar('attach events','.ui.launch.button');
      </script>

  </body>
</html>
