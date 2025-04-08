
window.showToast = function (message, type = 'success', options = {}) {
  var notyf = new Notyf();

  if (!notyf) {
    console.error('Notify is not available. Make sure the script is loaded.');
    return;
  }

  const config = {
    duration: 4000,
    position: {x:'right',y:'top'},
    ...options,
  };

  switch (type) {
    case 'success':
      notyf.success(message, config);
      break;
    case 'error':
      notyf.error(message, config);
      break;
    default:
      notyf(message, config);
  }
};
