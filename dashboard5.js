
$('#ocularnosupervisor')
  .form({
    fields: {
      servicetypes: {
        identifier: 'servicetypes',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose the service type.'
          }
        ]
      },
      oculars: {
        identifier: 'oculars',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an ocular request.'
          }
        ]
      }
    }
  })
;

$('#termitenoteam')
  .form({
    fields: {
      termite: {
        identifier: 'termite',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a Termite Treatment without a team.'
          }
        ]
      }
    }
  })
;

$('#householdnoteam')
  .form({
    fields: {
      household: {
        identifier: 'household',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a Household Treatment without a team.'
          }
        ]
      }
    }
  })
;

$('#gsnoteam')
  .form({
    fields: {
      generalservice: {
        identifier: 'generalservice',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a General Service without a team.'
          }
        ]
      }
    }
  })
;