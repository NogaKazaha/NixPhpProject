const Countries = [
  'Austria', 'Belgium', 'Bulgaria', 'Croatia', 'Republic of Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland', 
  'France', 'Germany', 'Greece', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Lithuania', 'Luxembourg', 'Malta', 'Netherlands', 
  'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden'
]

function validateField() {
  string = document.getElementById('field').value
  if(string == "") {
    document.querySelector('h2').setAttribute('id', 'error')
    document.querySelector('h2').innerHTML = 'Field should be not empty'
  } else {
    let isOK = /^[A-Z].{3}/.test(string);
    if(isOK == false) {
      document.querySelector('h2').setAttribute('id', 'error')
      document.querySelector('h2').innerHTML = 'Field should start with uppercase and have 4 or more letters'
    } else {
      let check = false;
      Countries.forEach(element => {
        if(element == string) {
          check = true
        }
      });
      if(check == false) {
        document.querySelector('h2').setAttribute('id', 'error')
        document.querySelector('h2').innerHTML = 'This country is not in the list of EU'
      } else {
        document.querySelector('h2').setAttribute('id', 'validated')
        document.querySelector('h2').innerHTML = 'Your country is in the EU list'
      }
    }
  }
}