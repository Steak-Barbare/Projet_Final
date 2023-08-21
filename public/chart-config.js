
const ctx = document.getElementById('chart').getContext('2d');
const config = {
  type: 'doughnut',
  data: {
    labels: labels,
    datasets: [{
      data: data,
      backgroundColor: [
        'rgb(234, 4, 157)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(86, 255, 100)',
      ],
      hoverOffset: 4
    }]
  }
};
new Chart(ctx, config);

// test -------------------------------------------------------------------------> OK 

const ctxParc = document.getElementById('chartParc').getContext('2d');

const configParc = {
  type: 'doughnut',
  data: {
    labels: labelsParc,
    datasets: [{
      data: dataParc,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(86, 255, 100)',
        'rgb(84, 18, 78)',
      ],
      hoverOffset: 5
    }]
  }
};

new Chart(ctxParc, configParc);



// test -------------------------------------------------------------------------> OK

const ctxCollab = document.getElementById('chartCollab').getContext('2d');

const configCollab = {
  type: 'doughnut',
  data: {
    labels: labelsCollab,
    datasets: [{
      data: dataCollab,
      backgroundColor: [
        'rgb(171, 234, 53)',
        'rgb(252, 45, 17)',
        'rgb(31, 17, 221)',
        'rgb(164, 249, 238)',
      ],
      hoverOffset: 4
    }]
  }
};

new Chart(ctxCollab, configCollab);


// test ------------------------------------------------------------------------->


const ctxStockage = document.getElementById('chartStockage').getContext('2d');

const configStockage = {
  type: 'doughnut',
  data: {
    labels: labelsStockage,
    datasets: [{
      data: dataStockage,
      backgroundColor: [
        'rgb(249, 221, 99)',
        'rgb(54, 162, 235)',
        'rgb(135, 17, 48)',
        'rgb(86, 255, 100)',
        'rgb(84, 18, 78)',
      ],
      hoverOffset: 5
    }]
  }
};

new Chart(ctxStockage, configStockage);


//-------------Fonction Replis des div affichant les noms des entreprises liées à leurs types-------------->

function showM365Companies() {
  let companiesDiv = document.getElementById('m365Companies');
  if (companiesDiv.style.display === 'none') {
    companiesDiv.style.display = 'block';
  } else {
    companiesDiv.style.display = 'none';
  }
}

function showGoogleWorkspaceCompanies() {
  let googleWorkspaceDiv = document.getElementById('googleWorkspace');
  if (googleWorkspaceDiv.style.display === 'none') {
    googleWorkspaceDiv.style.display = 'block';
  } else {
    googleWorkspaceDiv.style.display = 'none';
  }
}

function showMicrosoftExchangeCompanies() {
  let microsoftExchangeDiv = document.getElementById('microsoftExchange');
  if (microsoftExchangeDiv.style.display === 'none') {
    microsoftExchangeDiv.style.display = 'block';
  } else {
    microsoftExchangeDiv.style.display = 'none';
  }
}

function showAutresIdentCompanies() {
  let autresIdentDiv = document.getElementById('autresIdent');
  if (autresIdentDiv.style.display === 'none') {
    autresIdentDiv.style.display = 'block';
  } else {
    autresIdentDiv.style.display = 'none';
  }
}

//------------------------------------------------------------

function showMemCompanies() {
  let memDiv = document.getElementById('mem');
  if (memDiv.style.display === 'none') {
    memDiv.style.display = 'block';
  } else {
    memDiv.style.display = 'none';
  }
}

function showAirwatchCompanies() {
  let airWatchDiv = document.getElementById('airWatch');
  if (airWatchDiv.style.display === 'none') {
    airWatchDiv.style.display = 'block';
  } else {
    airWatchDiv.style.display = 'none';
  }
}

function showAzureCompanies() {
  let azureADDiv = document.getElementById('azureAD');
  if (azureADDiv.style.display === 'none') {
    azureADDiv.style.display = 'block';
  } else {
    azureADDiv.style.display = 'none';
  }
}

function showSansGestCompanies() {
  let sansGestDiv = document.getElementById('sansGest');
  if (sansGestDiv.style.display === 'none') {
    sansGestDiv.style.display = 'block';
  } else {
    sansGestDiv.style.display = 'none';
  }
}

function showAutresGestCompanies() {
  let autresParcDiv = document.getElementById('autresParc');
  if (autresParcDiv.style.display === 'none') {
    autresParcDiv.style.display = 'block';
  } else {
    autresParcDiv.style.display = 'none';
  }
}

//----------------------------------------------------

function showTeamsCompanies() {
  let teamsDiv = document.getElementById('teams');
  if (teamsDiv.style.display === 'none') {
    teamsDiv.style.display = 'block';
  } else {
    teamsDiv.style.display = 'none';
  }
}

function showGoogleMeetCompanies() {
  let googleMeetDiv = document.getElementById('googleMeet');
  if (googleMeetDiv.style.display === 'none') {
    googleMeetDiv.style.display = 'block';
  } else {
    googleMeetDiv.style.display = 'none';
  }
}

function showSlackCompanies() {
  let slackDiv = document.getElementById('slack');
  if (slackDiv.style.display === 'none') {
    slackDiv.style.display = 'block';
  } else {
    slackDiv.style.display = 'none';
  }
}

function showAutresCollabCompanies() {
  let autresCollabDiv = document.getElementById('autresCollab');
  if (autresCollabDiv.style.display === 'none') {
    autresCollabDiv.style.display = 'block';
  } else {
    autresCollabDiv.style.display = 'none';
  }
}

//--------------------------------------------

function showHddCompanies() {
  let hddDiv = document.getElementById('hdd');
  if (hddDiv.style.display === 'none') {
    hddDiv.style.display = 'block';
  } else {
    hddDiv.style.display = 'none';
  }
}

function showOneDriveCompanies() {
  let oneDriveDiv = document.getElementById('oneDrive');
  if (oneDriveDiv.style.display === 'none') {
    oneDriveDiv.style.display = 'block';
  } else {
    oneDriveDiv.style.display = 'none';
  }
}

function showDropBoxCompanies() {
  let dropBoxDiv = document.getElementById('dropBox');
  if (dropBoxDiv.style.display === 'none') {
    dropBoxDiv.style.display = 'block';
  } else {
    dropBoxDiv.style.display = 'none';
  }
}

function showNonMaitriseCompanies() {
  let nonMaitriseDiv = document.getElementById('nonMaitrise');
  if (nonMaitriseDiv.style.display === 'none') {
    nonMaitriseDiv.style.display = 'block';
  } else {
    nonMaitriseDiv.style.display = 'none';
  }
}

function showAutresStockageCompanies() {
  let autresStockageDiv = document.getElementById('autresStockage');
  if (autresStockageDiv.style.display === 'none') {
    autresStockageDiv.style.display = 'block';
  } else {
    autresStockageDiv.style.display = 'none';
  }
}

