const ftpClient = require('ftp');
const childSpawn = require('child_process').spawn;

let ftpConnection;

let latestTeg;
let files;

const getTag = spawn('git', ['describe', '--tags', '--abbrev=0'], {stdio: 'pipe'});
getTag.process.stdout.on('data', (data) => {
  latestTeg = data.toString('utf8').trim();
});

getTag.promise.then(() => {
  console.log(`Getting changes since ${latestTeg} update...`);
  const getFiles = spawn('git', ['diff', '--name-only', 'HEAD', latestTeg], {stdio: 'pipe'});
  getFiles.process.stdout.on('data', (data) => {
    files = data.toString('utf8').trim().split('\n');
  });
  return getFiles.promise;
}).then(() => {
  console.log(`The following files will be deployed:`);
  files.forEach((file) => console.log(file));
}).then(connect).then(() => {
  console.log('Successfully connected to the server');
  files.map((file) => upload(file));
  return Promise.all(files);
}).then(disconnect)
  .then(deployTag)
  .then(() => process.exit())
  .catch((err) => {
  if (err && err.type === `upload`) return console.error(`failed to upload ${file}`);
  console.error(err);
  process.exit(1);
});

function disconnect() {
  return new Promise((resolve, reject) => {
    ftpConnection.on('end', () => resolve());
    ftpConnection.on('error', (err) => reject(err));
    ftpConnection.end();
  });
}

process.on('unhandledRejection', (err) => {
  console.error(err);
});

function connect() {
  console.log(`Connecting to the ftp server`);
  ftpConnection = new ftpClient();
  return new Promise((resolve, reject) => {
    ftpConnection.on('ready', () => resolve());
    ftpConnection.on('error', (err) => {
      console.error(err);
      return reject(err);
    });
    ftpConnection.connect({
      host: 'files.000webhost.com',
      user: 'alaakana',
      password: 'n9yfm7TMYeVFTzrQJw78'
    });
  });
}

function upload(file) {
  return new Promise((resolve, reject) => {
    const dir = '/public_html/' + file.substring(0, file.lastIndexOf('/'));
    ftpConnection.mkdir(dir, true, (err) => {
      if (err) console.log(err);
      ftpConnection.put(file, `/public_html/${file}`, (err) => {
        if (err) return reject({type: 'upload', file, err});
        return resolve(console.log(`${file} was uploaded successfully`));
      });
    });
  });
}
function deployTag() {
  const newTag = new Date().toLocaleDateString();
  return spawn('git', ['tag', newTag]).promise
    .then(() => spawn('git', ['push', '--tags']).promise);
}

/**
 * Spawns a child and links its stdio to the parent
 * @param {String} command - the command to execute
 * @param {String[]} args - the arguments to apps to the command
 * @param {Object} opts - the options to spawn the child with
 * @return {Object<process,promise>} returns an object with child process and a promise to when the process finishes
 */
function spawn(command, args, opts = {}) {
  opts.stdio = opts.stdio || 'inherit';
  let child = {};
  child.process = childSpawn(command, args, opts);
  child.promise = new Promise((resolve, reject) => {
    child.process.on('error', (err) => {
      return reject(err);
    }).on('close', (code) => {
      if (code !== 0) {
        console.log(`Something went wrong, the process exited with code ${code}`);
        console.log(command, args);
        return reject();
      }
      return resolve();
    });
  });
  return child;
}
