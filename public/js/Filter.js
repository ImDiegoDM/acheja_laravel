function goToCategory(category) {
  var region = getParameterByName('region');
  var city = getParameterByName('city');
  var url=window.location.href.split('?')[0];
  url+='?';
  url+='category='+category;
  region ? url+='&region='+region: null;
  city ? url+='&city='+city: null;
  console.log(url);
  window.location.href=url;
}

function goToCity(city) {
  var region = getParameterByName('region');
  var category = getParameterByName('category');
  var url=window.location.href.split('?')[0];
  url+='?';
  url+='city='+city;
  region ? url+='&region='+region: null;
  category ? url+='&category='+category: null;
  console.log(url);
  window.location.href=url;
}

function goToRegion(region) {
  var city = getParameterByName('city');
  var category = getParameterByName('category');
  var url=window.location.href.split('?')[0];
  url+='?';
  url+='region='+region;
  city ? url+='&city='+city: null;
  category ? url+='&category='+category: null;
  console.log(url);
  window.location.href=url;
}

function cleanRegion() {
  var category = getParameterByName('category');
  var city = getParameterByName('city');
  var url=window.location.href.split('?')[0];
  if(category||city){
    url+='?';
    if(category){
      url+='&category='+category;
    }
    if(city){
      url+='&city='+city;
    }
  }
  window.location.href=url;
}

function cleanCategory() {
  var region = getParameterByName('region');
  var city = getParameterByName('city');
  var url=window.location.href.split('?')[0];
  if(region||city){
    url+='?';
    if(region){
      url+='&region='+region;
    }
    if(city){
      url+='&city='+city;
    }
  }
  window.location.href=url;
}

function cleanCity() {
  var region = getParameterByName('region');
  var category = getParameterByName('category');
  var url=window.location.href.split('?')[0];
  if(region||category){
    url+='?';
    if(region){
      url+='&region='+region;
    }
    if(category){
      url+='&category='+category;
    }
  }
  window.location.href=url;
}

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
  results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}
