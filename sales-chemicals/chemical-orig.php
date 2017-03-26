<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Hive Resource Management System - Add Chemical</title>
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
        <a class="item" href="../sales-orders/create-service-requests.php">
          Create Service Requests
        </a>
        <a class="item" href="../sales-orders/reschedule-service-requests.php">
          Reschedule Service Requests
        </a>
        <a class="item" href="chemical.php">
          Chemical Inventory
        </a>
        <a class="item" href="../sales-clients/clients-list.php">
          View Clients
        </a>
        <div class="item">
          <div class="header">
            Reports
          </div>
          <div class="menu">
            <a class="item" href="../sales-reports/termite-treatment-report.php">
              Termite Treatment Report
            </a>
            <a class="item" href="../sales-reports/household-treatment-report.php">
              Household Treatment Report
            </a>
            <a class="item" href="../sales-reports/general-services-report.php">
              General Services Report
            </a>
            <a class="item" href="../sales-reports/list-of-oculars-report.php">
              List of Oculars Report
            </a>
            <a class="item" href="../sales-reports/accomplished-oculars-report.php">
              Accomplished Oculars Report
            </a>
            <a class="item" href="../sales-resports/unaccomplished-oculars-report.php">
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

            <!-- CLIENT TOGGLE START -->
            <div class="three wide centered column">
              <div class="ui padded segment">
                  <h3 class="ui centered header">Choose an Action</h3>
                    <div class="ui slider checkbox">
                      <input type="radio" name="slide-client" id="slide-add">
                      <label>Add Chemical</label>
                    </div>
                    <br></br>
                    <div class="ui slider checkbox">
                      <input type="radio" name="slide-client" id="slide-remove">
                      <label>Remove Chemical</label>
                    </div>
                    <br></br>
                    <div class="ui slider checkbox">
                      <input type="radio" name="slide-client" id="slide-replenish">
                      <label>Replenish Chemical</label>
                    </div>
              </div>
            </div>
            <!-- CLIENT TOGGLE END -->

            <!-- ADD CHEMICALS START -->
            <div class="sixteen wide centered column chemical-add">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Add Chemicals</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form">
                    <div class="field">
                      <label>Product Name</label>
                      <input type="text" name="product-name" placeholder="Product Name">
                    </div>
                    <div class="field">
                      <div class="fields">
                        <div class="eight wide field">
                          <label>Quantity</label>
                          <input type="text" name="quantity" placeholder="Quantity">
                        </div>
                        <div class="eight wide field">
                        <label>Volume</label>
                        <input type="text" name="volume" placeholder="Volume">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Unit Description</label>
                      <textarea rows="2" name="unit-description"></textarea>
                    </div>
                    <div class="field">
                      <label>Chemical Brand</label>
                      <input type="text" name="chemical-brand" placeholder="Chemical Brand">
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- ADD CHEMICALS END -->

            <!-- REMOVE CHEMICALS START -->
            <div class="sixteen wide centered column chemical-remove">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Remove Chemicals</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form">
                    <div class="field">
                      <label>Chemicals</label>
                      <select class="ui search dropdown">
                        <option value="">Select Chemical to Remove</option>
                        <option value="#">Chemical 1</option>
                        <option value="#">Chemical 2</option>
                        <option value="#">Chemical 3</option>
                      </select>
                    </div>
                    <div class="field">
                      <label>Reason for Removal</label>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Damaged</label>
                      </div>
                      <br></br>
                      <div class="ui radio checkbox">
                        <input type="radio" name="radio">
                        <label>Expired</label>
                      </div>
                    </div>
                    <div class="field">
                      <label>Reason for Removal (other)</label>
                      <textarea rows="2" name="other-reason"></textarea>
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- REMOVE CHEMICALS END -->

            <!-- REPLENISH CHEMICALS START -->
            <div class="sixteen wide centered column chemical-replenish">
              <div class="ui basic padded segment">
                <h3 class="ui centered header">Replenish Chemical</h3>
                <div class="ui divider">
                </div>
                  <form class="ui form">
                    <div class="field">
                      <label>Chemicals</label>
                      <select class="ui search dropdown">
                        <option value="">Select Chemical to Replenish</option>
                        <option value="#">Chemical 1</option>
                        <option value="#">Chemical 2</option>
                        <option value="#">Chemical 3</option>
                      </select>
                    </div>
                    <div class="field">
                      <label>Amount</label>
                      <input type="text" name="amount" placeholder="Amount">
                    </div>
                    <button class="ui button primary" type="submit">Submit</button>
                  </form>
              </div>
            </div>
            <!-- REPLENISH CHEMICALS END -->
          </div>
        </div>
      </div>


      <!-- MAIN CONTENT END -->

      <!-- scripts -->
      <script>
      $('.chemical-add').css("display", "none");
      $('.chemical-remove').css("display", "none");
      $('.chemical-replenish').css("display", "none");


      $('#slide-add').click(function() {
        $('.chemical-add').show();
        $('.chemical-remove').hide();
        $('.chemical-replenish').hide();
      });
      $('#slide-remove').click(function() {
        $('.chemical-add').hide();
        $('.chemical-remove').show();
        $('.chemical-replenish').hide();
      });
      $('#slide-replenish').click(function() {
        $('.chemical-add').hide();
        $('.chemical-remove').hide();
        $('.chemical-replenish').show();
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
