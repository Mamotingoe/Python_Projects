require("dotenv").config();
const { notarize } = require("electron-notarize");

exports.default = async function notarizing(context) {
  const { electronPlatformName, appOutDir } = context;
  if (electronPlatformName !== "darwin") {
    return;
  }

  const appName = context.packager.appInfo.productFilename;
  const appleId = process.env.APPLEID;
  const password = process.env.APPLEPWD;
  const teamId = process.env.TEAMID;

  return await notarize({
    appBundleId: "com.knowledge.canvas.app",
    appPath: `${appOutDir}/${appName}.app`,
    appleId: appleId,
    appleIdPassword: password,
    teamId: teamId,
    tool: "notarytool",
  });
};
