//Function called to reset the text on the page
function Reset()
{
    var texts = document.getElementsByClassName('textResetable');
    for(var i=0; i < texts.length; i++)
    {
      texts[i].value = "";
    }

    var chkbxs = document.getElementsByClassName('chkBxResetable');
    for(var i =0; i < chkbxs.length; i++)
    {
    chkbxs[i].checked = false;
    }

    var radio = document.getElementsByClassName('radioBtnResetable');
    for(var i =0; i < radio.length; i++)
    {
    radio[i].checked = false;
    }

    var select = document.getElementById('suffixReset').selectedIndex = 0;
}

//Function called to simulate the submital of a form to send email message.
function simulateSubmit()
{
  var errorMessage = "";
  var returnError = false;

  var radioMessage = checkRadioButtons();

  var chkBxMessage = checkCheckBoxes();

  var email ="";
  if(verifyEmail())
  {
    email = checkEmail();
  }
  else
  {
    //returnError = true;
    //errorMessage += "Please provide your email address. \n";
  }

  var nameMessage ="";
  if(verifyName())
  {
    nameMessage = checkName();
  }
  else
  {
    returnError = true;
    errorMessage += "Please provide your name. \n";
  }

  var emailMessage = "";
  if(verifyMessage())
  {
    emailMessage = checkMessage();
  }
  else
  {
    returnError = true;
    errorMessage += "Please provide a message. \n";
  }


  if(returnError)
  {
    alert(errorMessage);
  }
  else
  {
    var sendingMessage = "Hello Travis,\n\n\tMy name is " + nameMessage + " " +  chkBxMessage + " " + radioMessage + "\n\n" + emailMessage;

    alert(sendingMessage);
    //emailTravis(sendingMessage , email);
  }
}

function checkRadioButtons()
{
    var errorMessage = "";
    var returnError = true;

    var radioButtons = document.getElementsByClassName('radioBtnResetable');
    var howThePersonGotHere = "";
    for(var i = 0; i < radioButtons.length; i++)
    {
        if(radioButtons[i].checked)
        {
            returnError = false;
            if(radioButtons[i].id == "LinkRadioBtn")
            {
              howThePersonGotHere = "I found this site by following a link.";
            }
            else if(radioButtons[i].id == "begChkBx")
            {
              howThePersonGotHere = "I found this site because you Travis asked me to come here.";
            }
            else if(radioButtons[i].id == "refRadioBtn")
            {
              howThePersonGotHere = "I found this site because someone told you about it.";
            }
            else
            {
              howThePersonGotHere = "Error on how person got here";
            }

            break;
        }
    }

    if(returnError)
    {
      return "I'm really glad you found this site.";
    }
    else
    {
      return "I'm really glad " + howThePersonGotHere;
    }
}

function checkCheckBoxes()
{
  var errorMessage = "";
  var returnError = true;

  var checkBoxes = document.getElementsByClassName('chkBxResetable')
  var aboutThePerson = "";
  var messages = ["NULL" , "NULL" , "NULL" , "NULL"];

  for(var i =0; i < checkBoxes.length; i++)
  {
    if (!checkBoxes[i].checked) continue;

    if(checkBoxes[i].id == "anonymousCheckBx")
    {
      continue;
    }
    else if(checkBoxes[i].id == "collegeChkBx")
    {
      //Remember that College is 0
      messages[0] = "I am going to college";
    }
    else if(checkBoxes[i].id == "EmployerChkBx")
    {
      //Remember employers are 1
      messages[1] = "I am a potential employer";
    }
    else if(checkBoxes[i].id == "famChkBx")
    {
      //Remember family is 2
      messages[2] = "I am a family member";
    }
    else if(checkBoxes[i].id == "programmerChkBx")
    {
      //Remember programmers is 3
      messages[3] = "I am a fellow programer";
    }
  }

  var totalCount = 0;
  var counter = 0;
  for(var i =0; i < messages.length; i++)
  {
    if(messages[i] != "NULL")
      totalCount++;
  }

  for(var i =0; i < messages.length; i++)
  {
    if(messages[i] != "NULL")
    {
      if(counter == 0)
      {
        aboutThePerson += messages[i];
        counter++;
      }
      else if(counter == (totalCount - 1))
      {
        aboutThePerson += (" and " + messages[i]);
        counter++;
      }
      else
      {
        aboutThePerson += (" , " + messages[i]);
        counter++;
      }
    }
  }
  return aboutThePerson + ".";

 }

function checkName()
{
  var suffixList = document.getElementById('suffixReset');

  var suffix = suffixList.options[suffixList.selectedIndex].value;

  return suffix + ". " + document.getElementById('NameTxtBx').value + ".";

}

function checkMessage()
{
  return document.getElementById('MessageTxtArea').value;
}

function verifyName()
{
  if(document.getElementById('NameTxtBx').value == "")
    return false;
  else
    return true;
}


function verifyMessage()
{
  if(document.getElementById('MessageTxtArea').value == "")
    return false;
  else
    return true;
}

function checkEmail()
{
  return document.getElementById('EmailTxtBx').value;
}

function verifyEmail()
{
  return false;

  //Not Checking the email due to the fact that the user will have to send the email through there prefered outlook
  //Once migrated to something else this will be checked
  if(document.getElementById('EmailTxtBx').value == "")
    return false;
  else
    return true;
}

function EmailTravis(message , emailAddress)
{
  var link = "mailto:travis.king.developer@gmail.com"
         + "?cc=myCCaddress@example.com"
         + "&subject=" + escape("Emailing Travis From Website")
         + "&body=" + escape(message);

window.location.href = link;
}
