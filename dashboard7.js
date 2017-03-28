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