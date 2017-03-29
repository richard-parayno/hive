$('#ocularreport')
  .form({
    fields: {
      size: {
        identifier: 'size',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the area size.'
          }
        ]
      },
      Findings: {
        identifier: 'Findings',
        rules: [
          {
            type   : 'empty',
            prompt : 'You must enter the findings.'
          }
        ]
      },
      radior: {
        identifier: 'radior',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must choose a recommendation.'
          }
        ]
      },
      radior1: {
        identifier: 'radior1',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must choose the degree of area infection.'
          }
        ]
      }
    }
  })
;

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
      }
    }
  })
;