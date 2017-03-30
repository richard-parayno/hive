$('#assignemployee')
  .form({
    fields: {
      client1: {
        identifier: 'client1',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select the Supervisor.'
          }
        ]
      },
      client2: {
        identifier: 'client2',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Employee.'
          },
          {
            type   : 'different[client3]',
            prompt : 'You can\'t choose the same employees!'
          },
          {
            type   : 'different[client4]',
            prompt : 'You can\'t choose the same employees!'
          }
        ]
      },
      client3: {
        identifier: 'client3',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Employee.'
          },
          {
            type   : 'different[client2]',
            prompt : 'You can\'t choose the same employees!'
          },
          {
            type   : 'different[client4]',
            prompt : 'You can\'t choose the same employees!'
          }
        ]
      },
      client4: {
        identifier: 'client4',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Employee.'
          },
          {
            type   : 'different[client2]',
            prompt : 'You can\'t choose the same employees!'
          },
          {
            type   : 'different[client3]',
            prompt : 'You can\'t choose the same employees!'
          }
        ]
      },
      client5: {
        identifier: 'client5',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select an Accountant.'
          }
        ]
      },
      item: {
        identifier: 'item',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must select atleast one item to use.'
          }
        ]
      },
      number: {
        identifier: 'number',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the amount to be used.'
          }
        ]
      }
    }
  })
;