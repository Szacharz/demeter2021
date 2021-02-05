function createTicketComponent(type) {
    type = type || null;
  
    var elements    = [],
        rootElement = document.createElement('tr'),
        price       = type === 'FREE' ? 0 : '';
  
    elements.push('<td><input type="text" name="tickets[][name]" /></td>');
    elements.push('<td><input type="text" name="tickets[][qty]" /></td>');
    elements.push(price === 0 ? type : '<td><input type="text" name="tickets[][price]"/></td>');
      
    rootElement.innerHTML = elements.join('');
    
    return rootElement;
  }
  
  
  function createFreeTicketComponent() {
    return createTicketComponent('FREE');
  }
  
  
  function onClickCreateTicketButton(event) {
    var button    = event.target,
        container = document.querySelector('#tickets'),
        component;
  
    if(button.classList.contains('free')) {
      component = createFreeTicketComponent();
    } else {
      component = createTicketComponent();
    }
  
    container.appendChild(component);
  }
  
  
  var buttonsGroup = document.getElementById('create-ticket-buttons');
  buttonsGroup.addEventListener('click', onClickCreateTicketButton);