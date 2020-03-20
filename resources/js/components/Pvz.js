import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Pvz extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Header</div>

                            <div className="card-body">Body!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('pvz')) {
    ReactDOM.render(<Example />, document.getElementById('pvz'));
}
