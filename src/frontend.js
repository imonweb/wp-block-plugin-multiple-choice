import React from 'react'
import ReactDOM from 'react-dom'

import "./frontend.scss"

const divsToUpdate = document.querySelectorAll(".paying-attention-update-me")

divsToUpdate.forEach(function(div) {
  // div.innerHTML = "Hello"
  ReactDOM.render(<Quiz />, div)
  div.classList.remove("paying-attention-update-me")
})

function Quiz() {
  return (
    <div className="paying-attention-frontend">
      hello from react
    </div>
  )
}