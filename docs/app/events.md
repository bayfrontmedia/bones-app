# Events

The app event subscribers are located at `/app/Events`.

Bones events documentation can be found [here](https://github.com/bayfrontmedia/bones/blob/master/docs/services/events.md).

## App events

- [Bootstrap](#bootstrap)
- [Dev](#dev)

### Bootstrap

The Bootstrap event subscriber exists to subscribe to events necessary to bootstrap the application,
typically to perform tasks on every request.

#### modifyResponseHeaders

| Events          | Priority |
|-----------------|----------|
| `app.bootstrap` | 5        |

This method exists to modify the headers sent whenever the [response service](https://github.com/bayfrontmedia/bones/blob/master/docs/services/response.md) sends.

The following headers are added:

- `X-Application`
- `X-Application-Version`

### Dev

The Dev event subscriber exists to subscribe to events when the application environment is `dev`.

#### sampleMethod

| Events          | Priority |
|-----------------|----------|
| `app.bootstrap` | 5        |

This method is a placeholder and can be removed.