$("#oculars").chained("#servicetypes");

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



