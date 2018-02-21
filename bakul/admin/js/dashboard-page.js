$(function () {
   $('#nav-home').addClass('active'); 
});

(function(w,d,s,g,js,fjs){
  g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
  js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
  js.src='https://apis.google.com/js/platform.js';
  fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
}(window,document,'script'));

gapi.analytics.ready(function() {

  // Step 3: Authorize the user.

  var CLIENT_ID = '59054972301-n2hkr4cgo5rhberd6s1rbskoh7l3ofd9.apps.googleusercontent.com';

  
  gapi.analytics.auth.authorize({
    container: 'auth-button',
    clientid: CLIENT_ID,
    userInfoLabel:""
  });

  // Step 5: Create the timeline chart.
  var timeline = new gapi.analytics.googleCharts.DataChart({
    reportType: 'ga',
    query: {
      'dimensions': 'ga:date',
      'metrics': 'ga:sessions',
      'start-date': '30daysAgo',
      'end-date': 'yesterday',
      'ids': "ga:31405"
    },
    chart: {
      type: 'LINE',
      container: 'timeline',
      options:{
        'animation.duration':200,
        animation:{
          duration:1000,
          startup:true
        }
      }
    }
  });

  gapi.analytics.auth.on('success', function(response) {
    //hide the auth-button
    document.querySelector("#auth-button").style.display='none';
    
    timeline.execute();

  });

});
