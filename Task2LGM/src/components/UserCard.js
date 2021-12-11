import React from 'react'
import "../../node_modules/bootstrap/dist/css/bootstrap.min.css";
import "../css/index.css";


const UserCard = ({ loading, users }) => {
  return loading ? (
    <div className="preloder" >
      Click the button to get user list
    </div>
  ) :
    (
      <div className="container ubody">
        <div className="row">

          {users.map(user =>
            <div className="col-xl-4 card">
              {
                console.log(user)
              }

              <div className="avatar">
                <img src={user.avatar} alt={user.avatar} className="avatar"></img>
                <h1 className="name">{user.first_name} {user.last_name}</h1>
                <p className="email">{user.email}</p>
                <p>User_ID: {user.id}</p>
              </div>
            </div>
          )
          }
        </div>
      </div>
    )
}

export default UserCard;