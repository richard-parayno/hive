$('#household')
  .form({
    fields: {
      householdoculars: {
        identifier: 'householdoculars',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a Household Ocular to schedule.'
          }
        ]
      },
      initialtreathousehold: {
        identifier: 'initialtreathousehold',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the Date of Initial Treatment.'
          }
        ]
      }
    }
  })
;
$('#termite')
  .form({
    fields: {
      termiteoculars: {
        identifier: 'termiteoculars',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a Termite Ocular to schedule.'
          }
        ]
      },
      initialtreattermite: {
        identifier: 'initialtreattermite',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the Date of Initial Treatment.'
          }
        ]
      }
      
    }
  })
;