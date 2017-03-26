$('#reschedform')
  .form({
    fields: {
      clientselect: {
        identifier: 'clientselect',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a client.'
          }
        ]
      },
      treatmenttype: {
        identifier: 'treatmenttype',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select a treatment type.'
          }
        ]
      },
      reschedulethis: {
        identifier: 'reschedulethis',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select the date of the service request to be rescheduled.'
          }
        ]
      },
      newdate: {
        identifier: 'newdate',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter a new date.'
          }
        ]
      }
    }
  })
;

$('#generalform')
  .form({
    fields: {
      aetype: {
        identifier: 'aetype',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Account Executive.'
          }
        ]
      },
      Date: {
        identifier: 'Date',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must choose a date.'
          }
        ]
      },
      Atype: {
        identifier: 'Atype',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must choose the job type.'
          }
        ]
      },
      newdate: {
        identifier: 'newdate',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter a new date.'
          }
        ]
      }
    }
  })
;

$('#ocularform')
  .form({
    fields: {
      daterequested: {
        identifier: 'daterequested',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the ocular date requested.'
          }
        ]
      },
      contactperson: {
        identifier: 'contactperson',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter a contact person.'
          }
        ]
      }
    }
  })
;
