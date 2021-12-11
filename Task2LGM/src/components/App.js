import UserCard from "./UserCard";
import "../../node_modules/bootstrap/dist/css/bootstrap.min.css";
import logo from "../pic/logo.jpeg";
import React, { Component } from "react";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = { user_data: [], visible: true };

    this.updateState = this.updateState.bind(this);
  }

  updateState() {
    const url = "https://reqres.in/api/users?page=1";
    fetch(url)
      .then((response) => response.json())
      .then((users) => {
        this.setState({ user_data: users.data, visible: false });

        console.log(users.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }

  render() {
    return (
      <>
        <section>
          <header className="header">
            <nav className="navbar">
              <div className="logo">
                <a href="#" className="nav-logo"><img src={logo} alt="" />
                  <p>LGM</p>
                </a>
              </div>
            </nav>
          </header>
        </section>
        <div className="ucard">
          <div className="btn-body">
            <button className="mybtn" onClick={this.updateState}>Get User</button>
          </div>

          <UserCard
            loading={this.state.visible}
            users={this.state.user_data}
          />
        </div>
      </>
    );
  }
}

export default App;
