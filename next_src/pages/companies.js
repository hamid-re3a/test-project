import React from "react";
import { Button, Container, Segment, Grid, Header, Tab } from "semantic-ui-react";
import { withRouter } from 'next/router'
import {
  Table,
  Message,
} from "semantic-ui-react";
import { connect } from "react-redux";

import { Component } from 'react'

class Home extends Component {

  render() {
    return (

      <React.Fragment>

        <Container style={{ marginTop: 30 }}>

          <Table compact basic='very'>

            <Table.Body>
              {/* We get an Object for todos so we have to map and pull out each "element" */}

              <Table.Row>
                <Table.HeaderCell width={4}>Name </Table.HeaderCell>
                <Table.HeaderCell width={2}>Phone Number</Table.HeaderCell>
                <Table.HeaderCell width={2}>Province </Table.HeaderCell>
                <Table.HeaderCell width={2}>Name </Table.HeaderCell>
              </Table.Row>
              <Table.Row>

                <Table.Cell width={4}>New</Table.Cell>
                <Table.Cell width={2}>9328</Table.Cell>
                <Table.Cell width={2}>Tehran</Table.Cell>
                <Table.Cell width={2}>Tehran</Table.Cell>
              </Table.Row>
            </Table.Body>
          </Table>

          <Message positive>
            <Message.Header>No Company</Message.Header>
            <p>
              Add One!
            </p>
          </Message>
        </Container>

      </React.Fragment>
    )
  }
}
const mapStateToProps = state => ({
  // todos: state.app.todos,
});

const ConnectedApp = withRouter(connect(mapStateToProps)(Home));
export default ConnectedApp